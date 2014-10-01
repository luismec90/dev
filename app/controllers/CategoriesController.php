<?php

class CategoriesController extends \BaseController {

    public function show($shop_link, $category_name) {
        $shop = Shop::with(['categories', 'categories.products'])->where('link', $shop_link)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();

        return View::make('shops.pages.category', compact('shop', 'category'));
    }

    public function adminShow($shop_name, $category_name) {
        $shop = Shop::with(['categories', 'categories.products'])->where('name', $shop_name)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();

        return View::make('shops.themes.admin.category.show', compact('shop', 'category'));
    }

    public function adminEdit($shop_name, $category_name) {
        $shop = Shop::with(['categories', 'categories.products'])->where('name', $shop_name)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();

        return View::make('shops.themes.admin.category.edit', compact('shop', 'category'));
    }

    public function adminUpdate($shop_name, $category_name) {

        $category = Category::where('name', $category_name)->firstOrFail();
        $category->name = Input::get('name');
        $category->save();

        Flash::success('Categoría editada correctamente');

       return Redirect::route('admin_edit_category_path', [$shop_name,$category->name]);

    }

}
