<?php

class ReportsController extends BaseController
{

    public function indexSales($shop_link)
    {
        $shop = Shop::with('categories', 'categories.products')->where('link', $shop_link)->firstOrFail();


        $q = DB::table('bills')
            ->join('purchases', 'bills.id', '=', 'purchases.bill_id')
            ->leftjoin('users', 'users.id', '=', 'bills.user_id')
            ->leftJoin('products', 'products.id', '=', 'purchases.product_id')
            ->select('purchases.product_name',
                'purchases.amount',
                'purchases.cost',
                'users.email',
                'users.id AS user_id',
                'users.first_name',
                'users.last_name',
                'purchases.created_at')
            ->where('bills.shop_id', $shop->id);

        if (Input::has('category')) {
            $q->where('products.category_id', Input::get('category'));
        }

        if (Input::has('product')) {
            $q->where('products.id', Input::get('product'));
        }

        if (Input::has('since')) {
            $q->where('purchases.created_at', '>=', Input::get('since') . ' 00:00:00');
        }

        if (Input::has('until')) {
            $q->where('purchases.created_at', '<=', Input::get('until') . ' 23:59:59');
        }

        $q2 = $q;
        $total = $q2->sum('cost');

        $sales = $q->orderBy('purchases.created_at', 'desc')->paginate(20);

        $selectCategories[''] = 'Seleccionar...';
        foreach ($shop->categories as $category) {
            $selectCategories[$category->id] = $category->name;
        }

        return View::make('shops.pages.admin.reports.sales', compact('shop', 'sales', 'selectCategories', 'total'));
    }

    public function exportSales($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $q = DB::table('bills')
            ->join('purchases', 'bills.id', '=', 'purchases.bill_id')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->leftJoin('products', 'products.id', '=', 'purchases.product_id')
            ->select('purchases.product_name AS Producto',
                'purchases.amount AS Cantidad',
                'purchases.cost AS Total',
                'users.email As Email_cliente',
                'users.first_name AS Nombres',
                'users.last_name AS Apellidos',
                'purchases.created_at AS Fecha')
            ->where('bills.shop_id', $shop->id);

        if (Input::has('category')) {
            $q->where('products.category_id', Input::get('category'));
        }

        if (Input::has('product')) {
            $q->where('products.id', Input::get('product'));
        }

        if (Input::has('since')) {
            $q->where('purchases.created_at', '>=', Input::get('since') . ' 00:00:00');
        }

        if (Input::has('until')) {
            $q->where('purchases.created_at', '<=', Input::get('until') . ' 23:59:59');
        }

        $sales = $q->orderBy('purchases.created_at', 'desc')->get();
        $sales = json_decode(json_encode((array)$sales), true);

        Excel::create($shop->link . '_reporte_ventas_' . date('Y-m-d'), function ($excel) use ($sales) {
            $excel->sheet('Sheetname', function ($sheet) use ($sales) {
                $sheet->fromArray($sales);
            });
        })->export('xls');
    }
}
