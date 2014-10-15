<?php

class StatisticsController extends \BaseController
{
    public function index($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $data = DB::table('bills')
            ->join('purchases', 'bills.id', '=', 'purchases.bill_id')
            ->where('shop_id', $shop->id)
            ->select('purchases.product_name',DB::raw('SUM(purchases.amount) AS cantidad'))
            ->groupBy('purchases.product_id')
            ->get();



        return View::make('shops.pages.admin.estadisticas.index', compact('shop','data'));
    }
}