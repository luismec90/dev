<?php

class SessionsController extends \BaseController
{


    public function create()
    {
        Session::put('previous_url', URL::previous());
        return View::make('pages.login');
    }

    public function store()
    {
        if (!Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password'), 'confirmed' => '1'], Input::has('remember'))) {
            Flash::error('Usuario o contraseña inválidos');

            return Redirect::back()->withInput();
        }
        if (Auth::user()->gender == 'f') {
            $welcome = 'Bienvenida';
        } else if (Auth::user()->gender == 'm') {
            $welcome = 'Bienvenido';
        } else {
            $welcome = 'Bienvenid@';
        }

        Flash::success("$welcome  nuevamente " . Auth::user()->first_name);

        $shop = Shop::whereHas('users', function ($query) {
            $query->where("users.id", Auth::user()->id);
            $query->where("role", 1);
        })->first();

        if (!is_null($shop)) {
            return Redirect::route('shop_path', $shop->link);
        }

        return Redirect::to(Session::get('previous_url'));
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::back();
    }

}
