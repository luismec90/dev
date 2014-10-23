<?php

class BillsController extends \BaseController
{

    public function index()
    {
        //
    }


    public function create($shop_link)
    {

        $shop = Shop::with('categories', 'categories.products')->where('link', $shop_link)->firstOrFail();

        $selectCategories[""] = "Seleccionar...";
        foreach ($shop->categories as $category) {
            $selectCategories[$category->id] = $category->name;
        }

        return View::make('shops.pages.admin.bills', compact('shop', 'selectCategories'));
    }


    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Bill::$rules, Bill::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $email = Input::get('email');
        $date = Input::get('date');
        $products = Input::get('products');
        $amounts = Input::get('amounts');
        $costs = Input::get('costs');
        $balance = Input::get('balance');
        $code = Input::get('code');
        $total = Input::get('total');

        if (!$products || !$amounts || !$costs) {
            Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

            return Redirect::back();
        }

        if ($email) {
            $user = User::where('email', $email)->first();
            $is_new_user = false;
            if (is_null($user)) {
                $is_new_user = true;
                $user = new User;
                $user->email = $email;
                $user->save();
            } else if (!$user->confirmed) {
                $is_new_user = true;
            }


            if ($balance != 0 && is_numeric($balance)) {
                if ($user->email == $email && $user->code == $code) {
                    $avalibleBalance = $user->saldo($shop->id);
                    if ($balance > $avalibleBalance) {
                        Flash::error('Ha saldo a descontar no puede ser mayor que el saldo disponible');
                        return Redirect::back();
                    }
                } else {
                    Flash::error('Código de verificación incorrecto');
                    return Redirect::back();
                }
            } else {
                $balance = 0;
            }

        }
        $bill = new Bill;
        $bill->shop_id = $shop->id;
        if ($email) {
            $bill->user_id = $user->id;
            $bill->redeemed = $balance;
        }

        if (date('Y-m-d') != $date)
            $bill->created_at = $date;

        $bill->save();

        $total_cost = -$balance;

        if (!Input::get('no_register_products')) {
            for ($i = 0;
                 $i < sizeof($products);
                 $i++) {

                if (empty($products[$i]) || empty($amounts[$i]) || empty($costs[$i])) {
                    $bill->delete();

                    Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

                    return Redirect::back();
                }

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
        } else {
            $total_cost = $total;
        }
        $retribution = round($total_cost * $shop->retribution);
        $bill->total_cost = $total_cost;
        $bill->retribution = $retribution;
        $bill->save();

        if ($email) {
            $is_user_in_shop = Shop::whereHas('users', function ($query) use ($user) {
                $query->where("users.id", $user->id);
                $query->where("role", 2);
            })->where('id', $shop->id)->first();

            if (is_null($is_user_in_shop)) {
                $user->shops()->attach($shop->id, ['role' => 2]);
            }

            $title = "Gracias por elegirnos";

            Mail::send('emails.shops.admin.bill', compact('shop', 'bill', 'title', 'user', 'is_new_user'), function ($message) use ($user, $shop) {
                $message->to($user->email, Auth::user()->first_name)
                    ->subject($shop->name . ' - Compra realizada');
            });
        }

        Flash::success('Registro creado exitosamente');

        return Redirect::back();
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
}