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


        $delivery = new Delivery;
        $delivery->product_id = Input::get('product');
        $delivery->user_id = Auth::user()->id;
        $delivery->phone = Input::get('phone');
        $delivery->address = Input::get('address');
        $delivery->note = Input::get('note');
        $delivery->save();

       /* Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function ($message) {
            $message->to(Input::get('email'), Input::get('first_name'))
                ->subject('Verificar email');
        }); */

        Flash::success('Su orden ha sido tomada correctamente!!');

        return Redirect::route('');
    }


    public function show($id)
    {
        //
    }


}