<?php

class PagesController extends BaseController {


    public function home()
    {
        return View::make('pages.home');
    }

    public function contact()
    {
        return View::make('pages.contact');
    }

}
