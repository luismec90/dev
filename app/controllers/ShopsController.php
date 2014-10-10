<?php

class ShopsController extends \BaseController
{

    public function show($shop_link)
    {
        $shop = Shop::with('categories', 'covers')->where('link', $shop_link)->firstOrFail();
        $popularProducts = Product::with('category')->orderBy('rating_cache', 'desc')->take(9)->get();

        return View::make('shops.pages.home', compact('shop', 'popularProducts'));
    }

    public function localization($shop_link)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.localization', compact('shop'));
    }

    public function subscriptions($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suscribed_users = User::whereHas('shops', function ($query) use ($shop) {
            $query->where("role", 2);
            $query->where("shops.id", $shop->id);
        })->get();

        return View::make('shops.pages.subscriptions', compact('shop','suscribed_users'));
    }

}
