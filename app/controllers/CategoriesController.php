<?php

class CategoriesController extends \BaseController {

    public function index($shop_link){
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.category.index', compact('shop'));
    }












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

    public function edit($shop_link, $category_id) {
        $shop = Shop::with(['categories', 'categories.products'])->where('link', $shop_link)->firstOrFail();
        $category = Category::findOrFail($category_id);

        return View::make('shops.pages.admin.category.edit', compact('shop', 'category'));
    }

    public function update($shop_link, $category_id) {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id',$category_id)->where('category_id',$shop->id);
        $category->name = Input::get('name');
        $category->save();

        Flash::success('Categoría editada correctamente');

       return Redirect::route('admin_edit_category_path', [$shop_link,$category->id]);

    }

}
