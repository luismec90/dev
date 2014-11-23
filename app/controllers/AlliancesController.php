<?php

class AlliancesController extends \BaseController
{
    public function index($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();


        return View::make('shops.pages.admin.alliances.index', compact('shop'));
    }

}