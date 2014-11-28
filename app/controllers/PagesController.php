<?php

class PagesController extends BaseController {


    public function test()
    {
        $shop = Shop::first();
        $bill = Bill::first();
        $title = "Gracias por elegirnos";
        $user = User::first();
        $is_new_user = false;

        return View::make('emails.shops.admin.bill', compact('shop', 'bill', 'title', 'user', 'is_new_user'));

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
            ->select(DB::raw('shops.*,shops.name,sum(bills.retribution) as retribution'))
            ->where('bills.user_id', Auth::user()->id)
            ->groupBy('shops.id')
            ->get();

        return View::make('pages.my_sites', compact('shops', 'ownShops'));
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
