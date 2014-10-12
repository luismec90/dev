<?php

class SocialNetworksController extends \BaseController
{

    public function loginWithFacebook()
    {

        // get data from input
        $code = Input::get('code');

        // get fb service
        $fb = OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($fb->request('/me'), true);
            $user = User::where('email', $result['email'])->first();
            if (is_null($user)) {
                $user = new User;
                $user->first_name = $result['first_name'];
                $user->last_name = $result['last_name'];
                $user->gender = ($result['gender'] == 'male') ? 'm' : 'f';
                $user->email = $result['email'];
                $user->avatar = 'default.png';
                $user->save();
            }

            if ($user->confirmed == 0) {
                Flash::success("Gracias por registrarse, por favor complete el siguiente formulario para activar su cuenta");
                return Redirect::route('complete_registration',["base",$user->email,sha1("$user->email-luis5484175")]);
            }

            Auth::login($user);

            if (Auth::user()->gender == 'f') {
                $welcome = 'Bienvenida';
            } else if (Auth::user()->gender == 'm') {
                $welcome = 'Bienvenido';
            } else {
                $welcome = 'Bienvenid@';
            }

            $shop = Shop::whereHas('users', function ($query) {
                $query->where("users.id", Auth::user()->id);
                $query->where("role", 1);
            })->first();

            Flash::success("$welcome  nuevamente " . Auth::user()->first_name);

            if (!is_null($shop)) {
                return Redirect::route('shop_path', $shop->link);
            }

            return Redirect::to(Session::get('previous_url'));

        } // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to((string)$url);
        }

    }

    public function loginWithGoogle()
    {

        // get data from input
        $code = Input::get('code');

        // get google service
        $googleService = OAuth::consumer('Google');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!empty($code)) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

            $user = User::where('email', $result['email'])->first();

            if (is_null($user)) {
                $user = new User;
                $user->first_name = $result['given_name'];
                $user->last_name = $result['family_name'];
                $user->email = $result['email'];
                $user->avatar = 'default.png';
                $user->save();
            }

            if ($user->confirmed == 0) {
                Flash::success("Gracias por registrarse, por favor complete el siguiente formulario para activar su cuenta");
                return Redirect::route('complete_registration',["base",$user->email,sha1("$user->email-luis5484175")]);
            }

            Auth::login($user);

            if (Auth::user()->gender == 'f') {
                $welcome = 'Bienvenida';
            } else if (Auth::user()->gender == 'm') {
                $welcome = 'Bienvenido';
            } else {
                $welcome = 'Bienvenid@';
            }

            $shop = Shop::whereHas('users', function ($query) {
                $query->where("users.id", Auth::user()->id);
                $query->where("role", 1);
            })->first();

            Flash::success("$welcome  nuevamente " . Auth::user()->first_name);

            if (!is_null($shop)) {
                return Redirect::route('shop_path', $shop->link);
            }

            return Redirect::to(Session::get('previous_url'));

        } // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Redirect::to((string)$url);
        }
    }
}
