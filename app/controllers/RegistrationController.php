<?php

class RegistrationController extends \BaseController
{


    public function create()
    {
        return View::make('pages.registration');
    }

    public function store()
    {
        $validation = Validator::make(Input::all(), User::$rules, User::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $confirmation_code = str_random(30);

        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->birth_date = Input::get('birth_date');
        $user->gender = Input::get('gender');
        $user->email = Input::get('email');
        $user->avatar = 'default.png';
        $user->password = Hash::make(Input::get('password'));
        $user->confirmation_code = $confirmation_code;
        $user->save();

        Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function ($message) {
            $message->to(Input::get('email'), Input::get('first_name'))
                ->subject('Verificar email');
        });


        Flash::success('¡Gracias por registrarse! Por favor, revise su email');

        return Redirect::home();
    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user) {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::success('Se ha verificado satisfactoriamente su cuenta');

        return Redirect::route('login_path');
    }
}
