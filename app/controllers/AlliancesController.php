<?php

class AlliancesController extends \BaseController {

    public function index($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        $shops = [];
        $selectedTown = '';
        $selectedActivity = '';

        if (Input::has('town') || Input::has('activity'))
        {

            $selectedTown = Input::get('town');
            $selectedActivity = Input::get('activity');

            $q = Shop::orderBy('name');

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

        }

        return View::make('shops.pages.admin.alliances.index', compact('shop', 'shops', 'towns', 'activities', 'selectedTown', 'selectedActivity'));
    }

    public function requestAlliance($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        Input::merge(['from'=>$shop->id]);

        $validation = Validator::make(Input::all(), Alliance::$rules);
        if ($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        }

        $to = Shop::findOrFail(Input::get('to'));

        Alliance::create(Input::all());

        Flash::success('Alianza solicitada exitosamente');

        return Redirect::back();

    }

}