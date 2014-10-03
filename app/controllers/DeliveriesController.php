<?php

class DeliveriesController extends \BaseController
{


    public function create($shop_link)
    {
        $shop = Shop::with('categories', 'categories.products')->where('link', $shop_link)->firstOrFail();

        $selectCategories[""] = "Seleccionar...";
        foreach ($shop->categories as $category) {
            $selectCategories[$category->id] = $category->name;
        }

        return View::make('shops.pages.delivery', compact('shop', 'selectCategories'));
    }


    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Delivery::$rules, Delivery::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $product=Product::find(Input::get('product'))->firstOrFail();

        $delivery = new Delivery;
        $delivery->product_id = Input::get('product');
        $delivery->user_id = Auth::user()->id;
        $delivery->phone = Input::get('phone');
        $delivery->address = Input::get('address');
        $delivery->note = Input::get('note');
        $delivery->save();

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        Mail::send('emails.shops.delivery',['product'=>$product], function ($message) use ($shop) {
            $message->to($shop->email, Auth::user()->first_name)
                ->subject('Pedido realizado');
        });

        Flash::success('Su orden ha sido tomada correctamente!!');

        return Redirect::route('shop_path',[$shop_link]);
    }


    public function show($id)
    {
        //
    }


}