<?php

class ShopsController extends \BaseController {

    public function create()
    {
        $towns = Town::orderBy('name')->get();
        $selectTowns[''] = '';

        foreach ($towns as $town)
        {
            $selectTowns[$town->id] = $town->name;

        }

        return View::make('pages.create_shop', compact('selectTowns'));
    }

    public function store()
    {
        $validation = Validator::make(Input::all(), Shop::$createRules, Shop::$validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        $shop = new Shop;
        $shop->name = Input::get('name');
        $shop->link = Input::get('link');
        $shop->town_id = Input::get('town_id');
        $shop->street_address = Input::get('street_address');
        $shop->email = Input::get('email');
        $shop->administrator_name = Input::get('administrator_name');
        $shop->cell = Input::get('cell');
        $shop->about = "Acerca ...";
        $shop->save();

        $path = "shops/{$shop->id}";

        if (!File::exists($path))
        {
            File::makeDirectory($path);
        }
        $path = "shops/{$shop->id}/products";

        if (!File::exists($path))
        {
            File::makeDirectory($path);
        }

        $path = "shops/{$shop->id}/covers";

        if (!File::exists($path))
        {
            File::makeDirectory($path);
        }

        $cover = new Cover;
        $cover->shop_id = $shop->id;
        $cover->caption = 'Texto de prueba 1';
        $cover->save();


        $photoPath = 'assets/images/demo-cover-1.gif';
        $photoExtension = 'gif';
        $path = "shops/{$shop->id}/covers";

        $filename = $cover->id . "." . $photoExtension;
        $cover->image = $filename;
        $cover->save();
        Image::make($photoPath)
            ->fit(900, 300)
            ->save("$path/$filename");

        $cover = new Cover;
        $cover->shop_id = $shop->id;
        $cover->caption = 'Texto de prueba 2';
        $cover->save();

        $photoPath = 'assets/images/demo-cover-2.gif';
        $photoExtension = 'gif';
        $path = "shops/{$shop->id}/covers";

        $filename = $cover->id . "." . $photoExtension;
        $cover->image = $filename;
        $cover->save();
        Image::make($photoPath)
            ->fit(900, 300)
            ->save("$path/$filename");

        $category = new Category;
        $category->shop_id = $shop->id;
        $category->name = 'Categoria de prueba';
        $category->save();

        $photoPath = 'assets/images/demo-product.gif';
        $photoExtension = 'gif';
        $product = new Product;
        $product->category_id = $category->id;
        $product->name = ('Producto de prueba');
        $product->description = 'Alguna descripción...';
        $product->price = '2.99';
        $product->publish = 1;
        $product->delivery_service = "1";
        $product->photo_extension = $photoExtension;
        $product->save();

        $path = "shops/{$shop->id}/products/{$product->id}";

        if (!File::exists($path))
        {
            File::makeDirectory($path);
        }

        $filename = 'mini.' . $photoExtension;
        Image::make($photoPath)
            ->fit(252, 126)
            ->save("$path/$filename");

        $filename = 'cover.' . $photoExtension;
        Image::make($photoPath)
            ->fit(900, 450)
            ->save("$path/$filename");

        Auth::user()->shops()->attach($shop->id, ['role' => 1]);

        Flash::success('Establecimiento creado exitosamente');

        return Redirect::route('shop_path', $shop->link);

    }

    public function show($shop_link)
    {
        $shop = Shop::with('categories', 'covers')->where('link', $shop_link)->firstOrFail();

        $categories = Category::where('shop_id', $shop->id)->lists('id');

        if (!$categories)
            $categories = [''];

        $popular_products = Product::with('category')->whereIn('category_id', $categories)->where('publish', 1)->take(9)->get();

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

        $suscribed_users = User::whereHas('shops', function ($query) use ($shop)
        {
            $query->where("role", 2);
            $query->where("shops.id", $shop->id);
        })->get();

        return View::make('shops.pages.admin.subscriptions', compact('shop', 'suscribed_users'));
    }

    public function exportSubscriptions($shop_link)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $suscribed_users = User::whereHas('shops', function ($query) use ($shop)
        {
            $query->where("role", 2);
            $query->where("shops.id", $shop->id);
        })->select('users.id', 'users.last_name AS Apellidos', 'users.first_name AS Nombres', 'gender AS Género', 'email as Email', 'created_at AS Fecha_suscripción')->orderBy('created_at')->get();

        foreach ($suscribed_users as $user)
        {
            $saldo = $user->saldo($shop->id);
            $user->Saldo = $saldo;
        }

        Excel::create($shop->link . '_suscripciones_' . date('Y-m-d'), function ($excel) use ($suscribed_users)
        {
            $excel->sheet('Sheetname', function ($sheet) use ($suscribed_users)
            {
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
        $validation = Validator::make(Input::all(), Shop::$updateRules, Shop::$validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $shop->name = Input::get('name');
        $shop->retribution = Input::get('retribution') / 100;
        $shop->balance_deadline = Input::get('balance_deadline');
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
            'logo.image'    => 'El campo logo debe ser una imagen',
        ];
        $validation = Validator::make(Input::all(), $rules, $validationMessages);
        if ($validation->fails())
        {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        if (Input::hasFile('logo'))
        {
            $photo = Input::file('logo');

            $path = "shops/{$shop->id}";
            if (!File::exists($path))
            {
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
