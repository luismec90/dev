<?php

class ShopsController extends \BaseController
{

    public function show($shop_link)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();
        $popularProducts=Product::with('category')->orderBy('rating_cache', 'desc')->take(5)->get();
        return View::make('shops.pages.home', compact('shop','popularProducts'));
    }

    public function localization($shop_link)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.localization', compact('shop'));
    }

    public function contact($shop_name)
    {
        $shop = Shop::with('categories')->where('name', $shop_name)->firstOrFail();

        return View::make('shops.themes.one.contact', compact('shop'));
    }

    public function adminCategories($shop_name)
    {
        $shop = Shop::with('categories')->where('name', $shop_name)->firstOrFail();

        return View::make('shops.themes.admin.category.index', compact('shop'));
    }

    public function indexDelivery($shop_link)
    {
        $shop = Shop::with('categories', 'categories.products')->where('link', $shop_link)->firstOrFail();

        $selectCategories[""]="Seleccionar...";
        foreach($shop->categories as $category){
            $selectCategories[$category->id]=$category->name;
        }

        return View::make('shops.pages.delivery', compact('shop','selectCategories'));
    }
}
