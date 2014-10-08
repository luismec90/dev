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
        $products = Input::get('products');
        $amounts = Input::get('amounts');
        $costs = Input::get('costs');

        if (!$products || !$amounts || !$costs) {
            Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

            return Redirect::back();
        }


        $user = User::where('email', $email)->first();

        if (is_null($user)) {
            $user = new User;
            $user->email = $email;
            $user->save();
        }


        $bill = new Bill;
        $bill->shop_id = $shop->id;
        $bill->user_id = $user->id;
        $bill->save();

        $total_cost = 0;

        for ($i = 0; $i < sizeof($products); $i++) {

            if (empty($products[$i]) || empty($amounts[$i]) || empty($costs[$i])) {
                $bill->delete();

                Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

                return Redirect::back();
            }

            $product = Product::findOrFail($products[$i]);
            $products[$i]=$product->name;

            $purchase = new Purchase;
            $purchase->bill_id = $bill->id;
            $purchase->product_id = $product->id;
            $purchase->product_name = $product->name;
            $purchase->amount = $amounts[$i];
            $purchase->cost = $costs[$i];
            $purchase->save();

            $total_cost += $costs[$i];
        }
        $retribution=round($total_cost * $shop->retribution);
        $bill->total_cost = $total_cost;
        $bill->retribution = $retribution;
        $bill->save();


        Mail::send('emails.shops.admin.bill',compact('shop','products','amounts','costs','total_cost','retribution'), function ($message) use ($user) {
            $message->to($user->email, Auth::user()->first_name)
                ->subject('Compra realizada');
        });

        Flash::success('Registro creado exitosamente');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     * GET /bills/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /bills/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /bills/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /bills/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}