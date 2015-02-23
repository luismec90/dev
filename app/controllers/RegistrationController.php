<?php

class RegistrationController extends \BaseController {


    public function create()
    {
        return View::make('pages.registration');
    }

    public function store()
    {
        $validation = Validator::make(Input::all(), User::$rules, User::$validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $confirmation_code = str_random(30);

        $user = new User;
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        //$user->birth_date = Input::get('birth_date');
        //$user->gender = Input::get('gender');
        $user->email = Input::get('email');
        $user->avatar = 'default.png';
        $user->password = Hash::make(Input::get('password'));
        $user->code = rand(1111, 9999);
        $user->confirmed = 1;
        //$user->confirmation_code = $confirmation_code;
        $user->save();

        /* Mail::send('emails.verify', compact('confirmation_code', 'user'), function ($message)
        {
            $message->to(Input::get('email'), Input::get('first_name'))
                ->subject('Verificar email');
        });
        */

        Auth::login($user);

        Flash::success('¡Gracias por registrarse!');

        if (Input::get('checkbox-shop'))
            return Redirect::route('create_shop_path');
        else
            return Redirect::route('home');

    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code)
        {
            Flash::error('Link inválido');

        } else
        {

            $user = User::whereConfirmationCode($confirmation_code)->first();

            if (!$user)
            {
                Flash::error('Link inválido');
            } else
            {

                $user->confirmed = 1;
                $user->confirmation_code = null;
                $user->save();


                Auth::login($user);

                Flash::success("Gracias por verificar su cuenta, ahora puede proceder a crear su establecimiento");

                return Redirect::route('create_shop_path');
            }
        }

        return Redirect::route('register_path');
    }

    public function completeRegistration($shop_link, $email, $token)
    {
        if (Auth::check())
        {
            Auth::logout();
        }

        if ($shop_link != "base")
        {
            $shop = Shop::where('link', $shop_link)->firstOrFail();
            $shop = $shop->link;
        } else
        {
            $shop = "base";
        }
        $user = User::where('email', $email)->where('confirmed', 0)->first();

        if ($token == sha1("$email-luis5484175") && !is_null($user))
        {
            return View::make('pages.complete_registration', compact('shop', 'user', 'token'));
        } else
        {
            Flash::error("Link inválido");

            return Redirect::route("home");
        }
    }

    public function endRegistration($shop_link, $email, $token)
    {
        if (Auth::check())
        {
            Auth::logout();
        }
        if ($shop_link != "base")
        {
            $shop = Shop::where('link', $shop_link)->firstOrFail();
        }
        $user = User::where('email', $email)->where('confirmed', 0)->first();

        if ($token == sha1("$email-luis5484175") && !is_null($user))
        {
            $validation = Validator::make(Input::all(), User::$rulesCompleteRegister, User::$validationMessages);
            if ($validation->fails())
            {
                return Redirect::back()->withInput()->withErrors($validation);
            }

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->birth_date = Input::get('birth_date');
            $user->gender = Input::get('gender');
            $user->avatar = 'default.png';
            $user->password = Hash::make(Input::get('password'));
            $user->code = rand(1111, 9999);
            $user->confirmed = 1;
            $user->save();

            Flash::success("Gracias por completar el registro");

            Auth::attempt(['email' => $email, 'password' => Input::get('password'), 'confirmed' => '1']);

            if ($shop_link != "base")
            {
                return Redirect::route("shop_path", $shop->link);
            } else
            {
                return Redirect::route("home");
            }

        } else
        {
            Flash::error("Link inválido");

            return Redirect::route("home");
        }

    }
}
