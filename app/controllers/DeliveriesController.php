<?php

class DeliveriesController extends \BaseController
{


    public function create($shop_link,$product_id=null)
    {
        $selectedProduct=Product::find($product_id);

        $shop = Shop::with('category', 'category.products')->where('link', $shop_link)->firstOrFail();

        $selectCategories[""] = "Seleccionar...";
        foreach ($shop->categories as $category) {
            $selectCategories[$category->id] = $category->name;
        }

        return View::make('shops.pages.delivery', compact('shop', 'selectCategories','selectedProduct'));
    }


    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Delivery::$rules, Delivery::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $products = Input::get('products');
        $amounts = Input::get('amounts');

        if (!$products || !$amounts) {
            Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

            return Redirect::back();
        }


        $delivery = new Delivery;
        $delivery->user_id = Auth::user()->id;
        $delivery->phone = Input::get('phone');
        $delivery->address = Input::get('address');
        $delivery->note = Input::get('note');
        $delivery->save();

        $bill = new Bill;
        $bill->shop_id = $shop->id;
        $bill->user_id = Auth::user()->id;
        $bill->delivery_id = $delivery->id;
        $bill->save();

        $total_cost = 0;



        for ($i = 0; $i < sizeof($products); $i++) {

            if (empty($products[$i]) || empty($amounts[$i])) {
                $bill->delete();

                Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

                return Redirect::back();
            }

            $product = Product::where('id',$products[$i])->where('delivery_service',1)->first();

            if(is_null($product)){
                $bill->delete();

                Flash::error('Ha ocurrido un error, asegurate de llenar todos los campos');

                return Redirect::back();
            }

            $purchase = new Purchase;
            $purchase->bill_id = $bill->id;
            $purchase->product_id = $product->id;
            $purchase->product_name = $product->name;
            $purchase->amount = $amounts[$i];
            $purchase->cost = round($product->price*$purchase->amount);
            $purchase->save();

            $total_cost += $purchase->cost;
        }
        $retribution=round($total_cost * $shop->retribution);
        $bill->total_cost = $total_cost;
        $bill->retribution = $retribution;
        $bill->save();

        $title="Se ha realizado el siguiente pedido";

        Mail::send('emails.shops.delivery',compact('shop','bill','title'), function ($message) use ($shop) {
            $message->to($shop->email, Auth::user()->first_name)
                ->subject('Pedido realizado');
        });

        $title="Has realizado el siguiente pedido";

        Mail::send('emails.shops.delivery',compact('shop','bill','title'), function ($message)  {
            $message->to(Auth::user()->email, Auth::user()->first_name)
                ->subject('Pedido realizado');
        });

        Flash::success('Su orden ha sido tomada correctamente!!');

        return Redirect::back();
    }


    public function show($id)
    {
        //
    }


}