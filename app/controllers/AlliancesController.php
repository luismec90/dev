<?php

class AlliancesController extends \BaseController {

    public function index($shop_link)
    {


        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();


        if (Input::has('town') || Input::has('activity'))
        {

            $selectedTown = Input::get('town');
            $selectedActivity = Input::get('activity');


            $alliancesWhereIAmA = DB::table('shops')
                ->join('alliances', 'alliances.from', '=', 'shops.id')
                ->where('shops.id', $shop->id)
                ->where('active', 1)
                ->lists('alliances.to');

            $alliancesWhereIAmB = DB::table('shops')
                ->join('alliances', 'alliances.to', '=', 'shops.id')
                ->where('shops.id', $shop->id)
                ->where('active', 1)
                ->lists('alliances.to');

            $currentAlliances = array_merge($alliancesWhereIAmA, $alliancesWhereIAmB, [$shop->id]);

            $q = Shop::orderBy('name')->whereNotIn('id', $currentAlliances);

            if ($selectedTown)
            {
                $q = $q->where('town_id', $selectedTown);
            }

            if ($selectedActivity)
            {
                $q = $q->whereHas('activities', function ($q2) use ($selectedActivity)
                {
                    $q2->where('activities.id', $selectedActivity);
                });
            }
            $shops = $q->get();

        } else
        {
            $shops = Shop::whereNotIn('id', [$shop->id])->orderBy('name')->get();
            $selectedTown = '';
            $selectedActivity = '';

        }

        return View::make('shops.pages.admin.alliances.index', compact('shop', 'shops', 'towns', 'activities', 'selectedTown', 'selectedActivity'));
    }

    public function requestAlliance($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        Input::merge(['from' => $shop->id]);

        $validation = Validator::make(Input::all(), Alliance::$rules);
        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }

        Shop::findOrFail(Input::get('to'));

        $alliance = Alliance::create(Input::all());

        Input::merge(['alliance_id' => $alliance->id]);
        Input::merge(['shop_id' => $shop->id]);

        AllianceRecord::create(Input::all());

        Flash::success('Alianza solicitada exitosamente');

        return Redirect::back();

    }

    public function pendingAlliances($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $pendingAlliances = Alliance::where('active', '0')
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->get();

        return View::make('shops.pages.admin.alliances.pendings', compact('shop', 'pendingAlliances'));
    }

    public function pendingAlliance($shop_link, $alliance_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $pendingAlliance = Alliance::with('allianceRecords','allianceRecords.shop')
            ->where('id', $alliance_id)
            ->where(function ($query) use ($shop)
            {
                $query->where("from", $shop->id)
                    ->orWhere("to", $shop->id);
            })->firstOrFail();

        return View::make('shops.pages.admin.alliances.pending', compact('shop', 'pendingAlliance'));
    }

    public function activeAlliances($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.alliances.actives', compact('shop'));
    }
}