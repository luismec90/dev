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
        Flash::success('Bienvenido nuevamente');

        return Redirect::to(Session::get('previous_url'));
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::back();
    }

}
