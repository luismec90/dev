<?php

class ProductsController extends \BaseController {

    public function show($shop_name, $category_name, $product_name) {
        $shop = Shop::with('categories')->where('name', $shop_name)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();
        $product = Product::where('name', $product_name)->firstOrFail();
        $reviews = [];
        return View::make('shops.themes.one.product', compact('shop', 'category', 'product', 'reviews'));
    }

    public function adminEdit($shop_name, $category_name, $product_name) {
        $shop = Shop::where('name', $shop_name)->firstOrFail();
        $category = Category::where('name', $category_name)->firstOrFail();
        $product = Product::where('name', $product_name)->firstOrFail();

        return View::make('shops.themes.admin.product.edit', compact('shop', 'category', 'product'));
    }

    public function adminUpdate($shop_name, $category_name, $product_name) {

        $product = Product::where('name', $product_name)->firstOrFail();
        $product->name = Input::get('name');
        $product->save();

        Flash::success('Producto editado correctamente');

        return Redirect::route('admin_edit_product_path', [$shop_name, $category_name, $product->name]);
    }

}
