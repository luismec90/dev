<?php

class ShopsController extends \BaseController
{

    public function show($shop_link)
    {
        $shop = Shop::with('categories', 'covers')->where('link', $shop_link)->firstOrFail();

        $categories = Category::where('shop_id', $shop->id)->lists('id');

        if (!$categories)
            $categories = [''];

        $popular_products = Product::with('category')->whereIn('category_id', $categories)->take(9)->get();

        return View::make('shops.pages.home', compact('shop', 'popular_products'));
    }

    public function localization($shop_link)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.localization', compact('shop'));
    }

    public function subscriptions($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suscribed_users = User::whereHas('shops', function ($query) use ($shop) {
            $query->where("role", 2);
            $query->where("shops.id", $shop->id);
        })->get();

        return View::make('shops.pages.admin.subscriptions', compact('shop', 'suscribed_users'));
    }

    public function exportSubscriptions($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suscribed_users = User::whereHas('shops', function ($query) use ($shop) {
            $query->where("role", 2);
            $query->where("shops.id", $shop->id);
        })->select('users.id','users.last_name AS Apellidos', 'users.first_name AS Nombres', 'gender AS Género', 'email as Email', 'created_at AS Fecha_suscripción')->orderBy('created_at')->get();

        foreach ($suscribed_users as $user) {
            $saldo = $user->saldo($shop->id);
            $user->Saldo = $saldo;
        }

        Excel::create($shop->link . '_suscripciones_' . date('Y-m-d'), function ($excel) use ($suscribed_users) {
            $excel->sheet('Sheetname', function ($sheet) use ($suscribed_users) {
                $sheet->fromArray($suscribed_users);
            });
        })->export('xls');

    }


    public function generalInformation($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $shop->retribution = $shop->retribution * 100;

        return View::make('shops.pages.admin.general_information', compact('shop', 'suscribed_users'));
    }

    public function updateGeneralInformation($shop_link)
    {
        $validation = Validator::make(Input::all(), Shop::$rules, Shop::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $shop->name = Input::get('name');
        $shop->retribution = Input::get('retribution') / 100;
        $shop->email = Input::get('email');
        $shop->phone = Input::get('phone');
        $shop->street_address = Input::get('street_address');
        $shop->schedule = Input::get('schedule');
        $shop->about = Input::get('about');
        $shop->cell = Input::get('cell');
        $shop->facebook = Input::get('facebook');
        $shop->name = Input::get('name');
        $shop->save();

        Flash::success('Información actualizada exitosamente');

        return Redirect::back();
    }

    public function logo($shop_link)
    {

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.logo', compact('shop', 'category', 'product'));
    }

    public function storeLogo($shop_link)
    {

        $rules = [
            'logo' => 'required|image'
        ];
        $validationMessages = [
            'logo.required' => 'El campo logo es obligatorio',
            'logo.image' => 'El campo logo debe ser una imagen',
        ];
        $validation = Validator::make(Input::all(), $rules, $validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        if (Input::hasFile('logo')) {
            $photo = Input::file('logo');

            $path = "shops/{$shop->id}";
            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            $filename = 'preview.' . $photo->getClientOriginalExtension();
            Image::make($photo->getRealPath())
                ->fit(300, 300)
                ->save("$path/$filename");
            $shop->image_preview = $filename;
            $shop->save();
        }


        Flash::success("Logo guardado correctamente");

        return Redirect::back();
    }
}
