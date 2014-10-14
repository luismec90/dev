<?php

class CoversController extends \BaseController {

    public function index($shop_link)
    {
        $shop = Shop::with('covers', 'categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.covers.index', compact('shop'));
    }

    public function create($shop_link)
    {
        $shop = Shop::with('covers', 'categories')->where('link', $shop_link)->firstOrFail();

        return View::make('shops.pages.admin.covers.create', compact('shop'));
    }

    public function store($shop_link)
    {
        $validation = Validator::make(Input::all(), Cover::$rules, Cover::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $cover = new Cover;
        $cover->shop_id = $shop->id;
        $cover->caption = Input::get('caption');
        $cover->save();

        if (Input::hasFile('photo')) {
            $photo = Input::file('photo');
            $path = "shops/{$shop->id}/covers";

            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            $filename=$cover->id.".".$photo->getClientOriginalExtension();
            $cover->image=$filename;
            $cover->save();
            Image::make($photo->getRealPath())
                ->fit(900,300)
                ->save("$path/$filename");
        }

        Flash::success('Cover creado correctamente');

        return Redirect::back();

    }

    public function edit($shop_link,$cover_id){
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $cover = Cover::where('id', $cover_id)->where('shop_id', $shop->id)->firstOrFail();

        return View::make('shops.pages.admin.covers.edit', compact('shop','cover'));
    }

    public function update($shop_link,$cover_id){

        $validation = Validator::make(Input::all(), Cover::$rulesUpdate, Cover::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();

        $cover = Cover::where('id', $cover_id)->where('shop_id', $shop->id)->firstOrFail();
        $cover->caption = Input::get('caption');
        $cover->save();

        if (Input::hasFile('photo')) {
            $photo = Input::file('photo');
            $path = "shops/{$shop->id}/covers";

            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            $filename=$cover->id.".".$photo->getClientOriginalExtension();
            $cover->image=$filename;
            $cover->save();
            Image::make($photo->getRealPath())
                ->fit(900,300)
                ->save("$path/$filename");
        }

        Flash::success('Cover editado correctamente');

        return Redirect::back();
    }

    public function destroy($shop_link,$cover_id){
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $cover = Cover::where('id', $cover_id)->where('shop_id', $shop->id)->firstOrFail();
        $cover->delete();
        $filename=$cover->image;

        $path = "shops/{$shop->id}/covers/$filename";
        if (!File::isDirectory($path)) {
            File::delete($path);
        }

        Flash::success('Producto eliminado correctamente');

        return Redirect::route('covers_path',$shop->link);
    }
}