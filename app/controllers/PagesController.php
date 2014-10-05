<?php

class PagesController extends BaseController {


    public function home()
    {
        $towns=Town::orderBy('name')->get();
        $activities=Activity::orderBy('name')->get();


        return View::make('pages.home',compact('towns','activities'));
    }

    public function contact()
    {
        return View::make('pages.contact');
    }

}
