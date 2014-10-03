<?php

class SearchesController extends BaseController
{

    public function index()
    {
        $where = Input::get('where');
        $activity = Input::get('activity');

        $shops=Shop::all();

        return View::make('pages.search',compact('shops'));
    }

}
