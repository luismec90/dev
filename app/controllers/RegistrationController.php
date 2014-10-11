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

    public function completeRegistration($shop_link, $email, $token)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $user = User::where('email', $email)->where('confirmed', 0)->first();

        if ($token == sha1("$email-luis5484175") && !is_null($user)) {
            return View::make('pages.complete_registration', compact('shop', 'user', 'token'));
        } else {
            Flash::error("Link inválido");

            return Redirect::route("home");
        }
    }

    public function endRegistration($shop_link, $email, $token)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $user = User::where('email', $email)->where('confirmed', 0)->first();

        if ($token == sha1("$email-luis5484175") && !is_null($user)) {
            $validation = Validator::make(Input::all(), User::$rulesCompleteRegister, User::$validationMessages);
            if ($validation->fails()) {
                return Redirect::back()->withInput()->withErrors($validation);
            }

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->birth_date = Input::get('birth_date');
            $user->gender = Input::get('gender');
            $user->avatar = 'default.png';
            $user->password = Hash::make(Input::get('password'));
            $user->confirmed = 1;
            $user->save();

            Flash::success("Gracias por completar tu registro");

            Auth::attempt(['email' => $email, 'password' => Input::get('password'), 'confirmed' => '1']);

            return Redirect::route("shop_path", $shop->link);

        } else {
            Flash::error("Link inválido");

            return Redirect::route("home");
        }

    }
}
