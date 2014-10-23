<?php

class SearchesController extends BaseController
{

    public function index()
    {
        $selectedTown = Input::get('town');
        $selectedActivity = Input::get('activity');
        if ($selectedTown || $selectedActivity) {
            $shops = Shop::whereHas('activities', function ($q) use ($selectedActivity) {
                if ($selectedActivity)
                    $q->where('activities.id', $selectedActivity);
            })->where(function ($q) use ($selectedTown) {
                if ($selectedTown)
                    $q->where('town_id', $selectedTown);
            })->orderBy('name')
                ->get();
        }else{
            $shops = Shop::orderBy('name')->get();
        }

        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();


        return View::make('pages.search', compact('shops', 'towns', 'activities', 'selectedTown', 'selectedActivity'));
    }

}
