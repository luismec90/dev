<?php

class BillsController extends \BaseController {

    public function index()
    {
        //
    }


    public function create($shop_link)
    {

        $shop = Shop::with('categories', 'categories.products')->where('link', $shop_link)->firstOrFail();

        $selectCategories[""] = "Seleccionar...";
        foreach ($shop->categories as $category)
        {
            $selectCategories[$category->id] = $category->name;
        }

        return View::make('shops.pages.admin.bills', compact('shop', 'selectCategories'));
    }


    public function store($shop_link)
    {

        $validation = Validator::make(Input::all(), Bill::$rules, Bill::$validationMessages);
        if ($validation->fails())
        {
            return Response::json(array(
                'messages' => $validation->getMessageBag()->toArray()
            ), 400);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $email = Input::get('email');
        $date = Input::get('date');
        $products = Input::get('products');
        $amounts = Input::get('amounts');
        $costs = Input::get('costs');
        $balance = Currency::toBack(Input::get('balance'));
        $code = Input::get('code');
        $total = Currency::toBack(Input::get('total'));


        // Si no son Arrays no proceder
        if (!is_array($products) || !is_array($amounts) || !is_array($costs))
        {
            return Response::json(array(
                'messages' => ["Por favor intentalo nuevamente"]
            ), 400);

        }

        // Si se ingreso el email, comporbar si es un cliente nuevo
        if ($email)
        {
            $user = User::where('email', $email)->first();
            $is_new_user = false;
            if (is_null($user))
            {
                $is_new_user = true;
                $user = new User;
                $user->email = $email;
                $user->save();
            } else if (!$user->confirmed)
            {
                $is_new_user = true;
            }


            if ($balance != 0 && is_numeric($balance))
            {
                if ($user->email == $email && $user->code == $code)
                {
                    $avalibleBalance = $user->saldo($shop->id);
                    if ($balance > $avalibleBalance)
                    {
                        return Response::json(array(
                            'messages' => ["El saldo a descontar no puede ser mayor que el saldo disponible"]
                        ), 400);

                    }
                } else
                {
                    return Response::json(array(
                        'messages' => ["Código de verificación incorrecto"]
                    ), 400);

                }
            } else
            {
                $balance = 0;
            }

        }

        $bill = new Bill;
        $bill->shop_id = $shop->id;
        if ($email)
        {
            $bill->user_id = $user->id;
            $bill->redeemed = $balance;
        }

        if (date('Y-m-d') != $date)
            $bill->created_at = $date;

        $bill->save();

        $total_cost = - $balance;

        // 6 querys | 2.37 ms


        if (!Input::get('no_register_products'))
        {
            for ($i = 0;
                 $i < sizeof($products);
                 $i ++)
            {
                if (empty($products[$i]) || empty($amounts[$i]) || empty($costs[$i]))
                {
                    $bill->delete();

                    return Response::json(array(
                        'messages' => ["Ha ocurrido un error, asegurate de llenar todos los campos"]
                    ), 400);

                }
                $costs[$i] = Currency::toBack($costs[$i]);
                $product = Product::findOrFail($products[$i]);
                $products[$i] = $product->name;

                $purchase = new Purchase;
                $purchase->bill_id = $bill->id;
                $purchase->product_id = $product->id;
                $purchase->product_name = $product->name;
                $purchase->amount = $amounts[$i];
                $purchase->cost = $costs[$i];
                $purchase->save();

                $total_cost += $costs[$i];
            }
        } else
        {
            $total_cost = $total;
        }

        // 12 querys || 5.11 ms


        $retribution = round($total_cost * $shop->retribution);
        $bill->total_cost = $total_cost;
        $bill->retribution = $retribution;
        $bill->save();

        if ($email)
        {
            $is_user_in_shop = Shop::whereHas('users', function ($query) use ($user)
            {
                $query->where("users.id", $user->id);
                $query->where("role", 2);
            })->where('id', $shop->id)->first();

            if (is_null($is_user_in_shop))
            {
                $user->shops()->attach($shop->id, ['role' => 2]);
            }

            // 14 querys || 5.98 ms


            $this->alliances($shop, $bill);

            $allianceRetributions = RetributionBetweenShop::with('shopWhoDistributes', 'shopWhoGives')
                ->where('bill_id', $bill->id)
                ->get();

            $title = "Gracias por elegirnos";

            Mail::send('emails.shops.admin.bill', compact('shop', 'bill', 'allianceRetributions', 'title', 'user', 'is_new_user'), function ($message) use ($user, $shop)
            {
                $message->to($user->email, Auth::user()->first_name)
                    ->subject($shop->name . ' - Compra realizada');
            });
        }

        // 15 querys || 6.11 ms

        if (!Input::get('no_register_products'))// Si registro productos actualizar inventarios
            $this->updateStock($shop, $bill->id);


        return Response::json(array(
            'messages' => ["Registro creado exitosamente"]
        ), 200);

    }

    public function destroy($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $bill = Bill::where('id', Input::get('bill_id'))->where('shop_id', $shop->id)->firstOrFail();
        $bill->canceled = 1;
        $bill->delete();

        Flash::success('Venta cancelada correctamente');

        return Redirect::back();
    }

    public function updateStock($shop, $bill_id)
    {

        $bill = Bill::with('purchases', 'purchases.product', 'purchases.product.stocks')->where('id', $bill_id)->first();

        foreach ($bill->purchases as $purchase)
        {

            foreach ($purchase->product->stocks as $stock)
            {
                $stock_history = new StockHistory;
                $stock_history->stock_id = $stock->id;
                $stock_history->amount = $purchase->amount * $stock->pivot->stock_spent * - 1;
                $stock_history->description = $purchase->product->name . " x " . $purchase->amount;
                $stock_history->save();

                $stock->updateTotalAmount($shop);
                $stock->save();
            }
        }
    }

    public function alliances($shop, $bill)
    {

        $alliancesWhereIAmFrom = Alliance::with('shopFrom', 'shopTo')
            ->where('status', '1')
            ->where("from", $shop->id)
            ->get();

        foreach ($alliancesWhereIAmFrom as $alliance)
        {
            $this->setBalanceToAlliance($bill, $alliance->shopFrom, $alliance->shopTo, $alliance->to_retribution_per_user_granted);
        }
        $alliancesWhereIAmTo = Alliance::with('shopFrom', 'shopTo')
            ->where('status', '1')
            ->where("to", $shop->id)
            ->get();

        foreach ($alliancesWhereIAmTo as $alliance)
        {
            $this->setBalanceToAlliance($bill, $alliance->shopto, $alliance->shopFrom, $alliance->from_retribution_per_user_granted);
        }

    }

    public function setBalanceToAlliance($bill, $shopA, $shopB, $retributionB)// El establecimiento A reliazo la venta y al cliente se le asigna  saldo en el establcimiento B
    {
        $retributionBetweenShop = new RetributionBetweenShop;
        $retributionBetweenShop->shop_who_distributes = $shopA->id;
        $retributionBetweenShop->shop_who_gives = $shopB->id;
        $retributionBetweenShop->user_id = $bill->user_id;
        $retributionBetweenShop->bill_id = $bill->id;
        $retributionBetweenShop->retribution = $bill->total_cost * $retributionB;
        $retributionBetweenShop->save();
    }
}