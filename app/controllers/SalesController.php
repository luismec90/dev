<?php

class SalesController extends \BaseController {

    public function create($shop_name) {
        $shop = Shop::with(['categories', 'categories.products'])->where('name', $shop_name)->firstOrFail();
        
        return View::make('shops.themes.admin.sale.create', compact('shop'));
    }

}
