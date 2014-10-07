<?php

class MembersController extends BaseController
{


    public function store()
    {
        if (Input::get('shop_id')) {
            Auth::user()->shops()->attach(Input::get('shop_id'), ['role' => 2]);
            $shop = Shop::findOrFail(Input::get('shop_id'));

            Flash::success("Ahora estás suscrito a {$shop->name}");
        }

        return Redirect::back();
    }

    public function destroy()
    {
        if (Input::get('shop_id')) {
            Auth::user()->shops()->detach(Input::get('shop_id'));
            $shop = Shop::findOrFail(Input::get('shop_id'));

            Flash::success("Ya no estás suscrito a {$shop->name}");
        }
        return Redirect::back();
    }

}
