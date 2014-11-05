<?php

class StocksController extends \BaseController
{

    public function index($shop_link)
    {
        $shop = Shop::with('stocks', 'stocks.unit')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.stock.index', compact('shop'));
    }

    public function create($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $units = Unit::all();

        $array_units[""] = "Seleccionar...";

        foreach ($units as $unit) {
            $array_units[$unit->id] = "$unit->name ($unit->symbol)";
        }

        return View::make('shops.pages.admin.stock.create', compact('shop', 'array_units'));
    }

    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Stock::$rules, Stock::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $stock = new Stock;
        $stock->shop_id = $shop->id;
        $stock->unit_id = Input::get('unit_id');
        $stock->name = Input::get('name');
        $stock->trigger = Input::get('trigger');
        $stock->save();

        Flash::success('Inventario creado correctamente');

        return Redirect::back();
    }

    public function edit($shop_link, $stock_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();

        $units = Unit::all();

        $array_units[""] = "Seleccionar...";

        foreach ($units as $unit) {
            $array_units[$unit->id] = "$unit->name ($unit->symbol)";
        }

        return View::make('shops.pages.admin.stock.edit', compact('shop', 'array_units', 'stock'));
    }

    public function update($shop_link, $stock_id)
    {
        $validation = Validator::make(Input::all(), Stock::$rules, Stock::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();
        $stock->unit_id = Input::get('unit_id');
        $stock->name = Input::get('name');
        $stock->trigger = Input::get('trigger');
        $stock->save();

        Flash::success('Inventario actualizado correctamente');

        return Redirect::back();
    }

    public function destroy($shop_link, $stock_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();
        $stock->delete();

        Flash::success('Item eliminado correctamente');

        return Redirect::route('stock_path', $shop->link);
    }

    public function updateAmount($shop_link)
    {
        $stock_id = Input::get('stock_id');

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();

        $stock_history = new StockHistory;
        $stock_history->stock_id = $stock->id;
        $stock_history->amount = Input::get('change_amount');
        $stock_history->description = Input::get('description');
        $stock_history->save();

        $stock->total_amount = DB::table('stock_histories')->where('stock_id', $stock->id)->sum('amount');
        $stock->save();

        Flash::success('Cantidad actualizada correctamente');

        return Redirect::back();
    }

    public function historic($shop_link, $stock_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();

        $historicals = DB::table('stock_histories')->where('stock_id', $stock->id)->orderBy('created_at', 'desc')->paginate(20);

        return View::make('shops.pages.admin.stock.historic', compact('shop', 'stock', 'historicals'));
    }

    public function relateStockProduct($shop_link, $category_id, $product_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();

        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();

        $stocks = Stock::with('unit')->orderBy('name')->get();

        return View::make('shops.pages.admin.stock.relate_product_stock', compact('shop', 'category', 'product', 'stocks'));
    }

    public function storeRelateStockProduct($shop_link, $category_id, $product_id)
    {
        $stock_id = Input::get('stock_id');

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();

        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();

        $exist = DB::table('product_stock')
            ->where('product_id', $product->id)
            ->where('stock_id', $stock_id)
            ->get();

        if ($exist) {
            Flash::error('Ingrediente duplicado');
        } else {
            $product->stocks()->attach($stock_id, array('stock_spent' => Input::get('amount')));
            Flash::success('Ingrediente agregado correctamente');
        }

        return Redirect::back();

    }

    public function destroyRelateStockProduct($shop_link, $category_id, $product_id)
    {
        $stock_id = Input::get('stock_id');

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();

        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();

        $stock = Stock::where('id', $stock_id)->where('shop_id', $shop->id)->firstOrFail();

        $product->stocks()->detach($stock->id);

        Flash::success('Ingrediente eliminado correctamente');

        return Redirect::back();
    }

}