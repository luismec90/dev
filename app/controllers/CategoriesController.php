<?php

class CategoriesController extends \BaseController
{

    public function index($shop_link)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.category.index', compact('shop'));
    }

    public function create($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.category.create', compact('shop'));
    }


    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Category::$rules, Category::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $category = Category::where('name', Input::get('name'))->where('shop_id', $shop->id)->first();

        if (!is_null($category)) {
            $errors = new Illuminate\Support\MessageBag;
            $errors->add('message', 'El nombre de la categoría debe ser único');

            return Redirect::back()->withInput()->withErrors($errors);
        }

        $category = new Category;
        $category->shop_id = $shop->id;
        $category->name = Input::get('name');
        $category->save();

        Flash::success('Categoría creada correctamente');

        return Redirect::route('admin_category_path', $shop->link);
    }


    public function show($shop_link, $category_name)
    {
        $shop = Shop::with(['categories', 'categories.products'])->where('link', $shop_link)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();

        return View::make('shops.pages.category', compact('shop', 'category'));
    }


    public function edit($shop_link, $category_id)
    {
        $shop = Shop::with(['categories', 'categories.products'])->where('link', $shop_link)->firstOrFail();
        $category = Category::findOrFail($category_id);

        return View::make('shops.pages.admin.category.edit', compact('shop', 'category'));
    }

    public function update($shop_link, $category_id)
    {
        $validation = Validator::make(Input::all(), Category::$rules, Category::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $category = Category::where('id', '<>', $category_id)->where('name', Input::get('name'))->where('shop_id', $shop->id)->first();

        if (!is_null($category)) {
            $errors = new Illuminate\Support\MessageBag;
            $errors->add('message', 'El nombre de la categoría debe ser único');

            return Redirect::back()->withInput()->withErrors($errors);
        }

        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();
        $category->name = Input::get('name');
        $category->save();

        Flash::success('Categoría actualizada correctamente');

        return Redirect::route('admin_edit_category_path', [$shop_link, $category->id]);

    }

    public function destroy($shop_link, $category_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id);
        $category->delete();

        Flash::success('Categoría eliminada correctamente');

        return Redirect::route('admin_category_path', $shop->link);
    }


}
