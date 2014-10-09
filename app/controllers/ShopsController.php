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


    public function becomeMember()
    {   $shop_id=Input::get('shop_id');
        $shop = Shop::find($shop_id)->firstOrFail();
        if($shop_id && Auth::user()->isMember($shop->link)){


            return Redirect::back();
        }else{
            return Redirect::back();
        }


        return View::make('shops.themes.admin.category.index', compact('shop'));
    }

}
