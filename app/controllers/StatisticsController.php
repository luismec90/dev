<?php

class StatisticsController extends \BaseController
{
    public function index($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $q = DB::table('bills')
                ->join('purchases', 'bills.id', '=', 'purchases.bill_id')
                ->where('shop_id', $shop->id);


        if (Input::has('since')) {
            $q->where('purchases.created_at', '>=', Input::get('since') . ' 00:00:00');
        }

        if (Input::has('until')) {
            $q->where('purchases.created_at', '<=', Input::get('until') . ' 23:59:59');
        }

        $data = $q->select('purchases.product_name', DB::raw('SUM(purchases.amount) AS cantidad'))
            ->groupBy('purchases.product_id')
            ->get();

        return View::make('shops.pages.admin.statistics.index', compact('shop', 'data'));
    }
}