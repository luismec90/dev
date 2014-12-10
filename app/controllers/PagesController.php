<?php

use Carbon\Carbon;

class PagesController extends BaseController {


    public function test()
    {
       return number_format((float) "14500,2",2, ',', '.');
    }

    public function shops()
    {
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();


        return View::make('pages.shops', compact('towns', 'activities'));
    }

    public function buyers()
    {
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        return View::make('pages.buyers', compact('towns', 'activities'));
    }

    public function welcome()
    {
        $towns = Town::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        return View::make('pages.welcome', compact('towns', 'activities'));
    }

    public function contact()
    {
        return View::make('pages.contact');
    }

    public function contactPioner()
    {
        return View::make('pages.contact_pioner');
    }

    public function sendContact()
    {
        $rules = [
            'message' => 'required',
            'subject' => 'required',
            'name'    => 'required',
            'email'   => 'required'
        ];
        $validationMessages = [
            'message.required' => 'El campo mensaje es obligatorio',
            'subject.required' => 'El campo asunto es obligatorio',
            'name.required'    => 'El campo nombre es obligatorio',
            'email.required'   => 'El campo email es obligatorio',
        ];

        $validation = Validator::make(Input::all(), $rules, $validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        Mail::send('emails.contact', [], function ($message)
        {
            $message->to('luismec90@gmail.com', Input::get('name'))
                ->subject('Contacto');
        });

        Flash::success('Su mensaje se ha enviado exitosamente, muchas gracias.');

        return Redirect::back();
    }

    public function sendContactPioner()
    {
        $rules = [
            'subject' => 'required',
            'name'    => 'required',
            'email'   => 'required'
        ];
        $validationMessages = [
            'subject.required' => 'El campo asunto es obligatorio',
            'name.required'    => 'El campo nombre es obligatorio',
            'email.required'   => 'El campo email es obligatorio',
        ];

        $validation = Validator::make(Input::all(), $rules, $validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        Mail::send('emails.contact_pioner', [], function ($message)
        {
            $message->to('luismec90@gmail.com', Input::get('name'))
                ->subject('Contacto');
        });

        Flash::success('Su mensaje se ha enviado exitosamente, muchas gracias.');

        return Redirect::back();
    }


    public function mySites()
    {

        $ownShops = DB::table('shops')
            ->join('shop_user', 'shops.id', '=', 'shop_user.shop_id')
            ->where('shop_user.user_id', Auth::user()->id)
            ->where('role', 1)
            ->get();


        $shops = DB::table('shops')
            ->join('bills', 'shops.id', '=', 'bills.shop_id')
            ->select(DB::raw('shops.*,sum(bills.retribution) as retribution'))
            ->where('bills.user_id', Auth::user()->id)
            ->groupBy('shops.id')
            ->get();

        $shopsIDs = [];

        foreach ($shops as $shop)
        {
            array_push($shopsIDs, $shop->id);
        }

        $q = DB::table('shops')
            ->join('retribution_between_shops', 'shops.id', '=', 'retribution_between_shops.shop_who_gives')
            ->select(DB::raw('shops.*,sum(retribution_between_shops.retribution) as retribution'))
            ->where('retribution_between_shops.user_id', Auth::user()->id);

        if (!empty($shopsIDs))
            $q = $q->whereNotIn('shops.id', $shopsIDs);

        $shopsByAlliances = $q->groupBy('shops.id')
            ->get();

        return View::make('pages.my_sites', compact('ownShops', 'shops', 'shopsByAlliances'));
    }


    public function listShops()
    {
        $shops = Shop::all();

        return View::make('pages.list_shops', compact('shops'));
    }

    public function promo()
    {
        return View::make('pages.promo');
    }


}
