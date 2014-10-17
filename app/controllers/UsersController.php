<?php

class UsersController extends \BaseController
{

    public function showProfile()
    {
        return View::make('pages.profile.general_info');
    }

    public function updateProfile()
    {

        $validation = Validator::make(Input::all(), User::$updateRules, User::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        } else {
            Auth::user()->first_name = Input::get('first_name');
            Auth::user()->last_name = Input::get('last_name');
            Auth::user()->birth_date = Input::get('birth_date');
            Auth::user()->gender = Input::get('gender');
            Auth::user()->email = Input::get('email');
            Auth::user()->code = Input::get('code');

            if (Input::hasFile('avatar')) {
                $file = Input::file('avatar');
                $fileName = Auth::user()->id . '.' . $file->getClientOriginalExtension();
                $file->move("users/avatars", $fileName);
                Auth::user()->avatar = $fileName;
            }

            Auth::user()->save();

            Flash::success('Sus datos se han actualizado exitosamente!');

            return Redirect::back();
        }
    }

    public function showPassword()
    {
        return View::make('pages.profile.change_password');
    }

    public function updatePassword()
    {
        $validation = Validator::make(Input::all(), User::$updatePasswordRules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        } else {

            if (Auth::user()->password == "" || Hash::check(Input::get('old_password'), Auth::user()->password)) {
                Auth::user()->password = Hash::make(Input::get('password'));
                Auth::user()->save();
                Flash::success('Su contraseña se ha actualizado exitosamente');
            } else {
                return Redirect::back()->withInput()->withErrors(['message' => 'La contraseña anterior no es correcta']);
            }
            return Redirect::back();
        }
    }

    public function getUser($shop_link)
    {
        $email = Input::get('email');
        $user = User::where('email', $email)->first();
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        if ($user) {
            $user->retribution = $user->saldo($shop->id);
            return $user;
        } else {
            return "[]";
        }

    }

    public function infoUser()
    {
        $user_id = Input::get("user_id");
        $shop_id = Input::get("shop_id");


        if (Auth::check() && Auth::user()->isAdmin($shop_id)) {

            $shop = Shop::find($shop_id);
            $user = User::find($user_id);

            if ($shop && $user && $user->isMember($shop_id)) {

                $bills = Bill::with('purchases')
                    ->where('shop_id', $shop_id)
                    ->where('user_id', $user_id)
                    ->get();

                return View::make('shops.layouts.partials.table_info_user', compact('bills'));
            }
        }

        return Response::make('Unauthorized', 401);

    }

    public function autocompleteEmailUser($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $email = Input::get('term');

        $results = array();

        $queries = DB::table('users')
            ->join('shop_user','users.id','=','shop_user.user_id')
            ->where('shop_user.shop_id',$shop->id)
            ->where('shop_user.role',2)
            ->where('email', 'LIKE', '%' . $email . '%')
            ->select('users.id','users.email')
            ->take(5)->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->email];
        }
        return Response::json($results);
    }
}
