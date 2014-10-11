<?php

class PagesController extends BaseController {


    public function test()
    {
        $shop = Shop::first();
        $bill = Bill::first();
        $title="Gracias por su compra";
        $user=User::first();
        $is_new_user=true;

        return View::make('emails.shops.admin.bill',compact('shop','bill','title','user','is_new_user'));

    }

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
    public function sendContact()
    {
        $rules=[
            'message'=>'required',
            'subject'=>'required',
            'name'=>'required',
            'email'=>'required'
        ];
        $validationMessages= [
            'message.required'=>'El campo mensaje es obligatorio',
            'subject.required'=>'El campo asunto es obligatorio',
            'name.required'=>'El campo nombre es obligatorio',
            'email.required'=>'El campo email es obligatorio',
            ];

        $validation = Validator::make(Input::all(), $rules, $validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        Mail::send('emails.contact', [], function ($message) {
            $message->to('luismec90@gmail.com', Input::get('name'))
                ->subject('Contacto');
        });

        Flash::success('Su mensaje se ha enviado exitosamente, muchas gracias.');

        return Redirect::back();
    }

    public function balance()
    {
        $shops=DB::table('shops')->join('bills', 'shops.id', '=', 'bills.shop_id')->select(DB::raw('shops.*,shops.name,sum(bills.retribution) as retribution'))
            ->where('bills.user_id', Auth::user()->id)
            ->groupBy('shops.id')
            ->get();

        return View::make('pages.balance',compact('shops'));
    }


    public function listShops()
    {
        $shops=Shop::all();

        return View::make('pages.listShops',compact('shops'));
    }
}
