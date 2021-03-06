<?php

class ProductsController extends \BaseController
{

    public function index($shop_link, $category_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::with('products')->where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();

        return View::make('shops.pages.admin.product.index', compact('shop', 'category'));
    }

    public function create($shop_link, $category_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();

        return View::make('shops.pages.admin.product.create', compact('shop', 'category'));
    }


    public function store($shop_link, $category_id)
    {
        $validation = Validator::make(Input::all(), Product::$rules, Product::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }


        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->first();
        $product = Product::where('name', Input::get('name'))->where('category_id', $category->id)->first();

        if (!is_null($product)) {
            $errors = new Illuminate\Support\MessageBag;
            $errors->add('message', 'El nombre del producto debe ser único');

            return Redirect::back()->withInput()->withErrors($errors);
        }


        $product = new Product;
        $product->category_id = $category->id;
        $product->name = Input::get('name');
        $product->description = Input::get('description');
        if (Input::get('price'))
            $product->price = Input::get('price');
        $product->publish = Input::has('publish');
        if (Input::has('delivery_service')) {
            $product->delivery_service = "1";
        } else {
            $product->delivery_service = "0";
        }
        $product->save();

        if (Input::hasFile('photo')) {
            $photo = Input::file('photo');
            $product->photo_extension = $photo->getClientOriginalExtension();
            $product->save();

            $path = "shops/{$shop->id}/products/{$product->id}";
            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            $filename = 'mini.' . $product->photo_extension;
            Image::make($photo->getRealPath())
                ->fit(252, 126)
                ->save("$path/$filename");

            $filename = 'cover.' . $product->photo_extension;
            Image::make($photo->getRealPath())
                ->fit(900, 450)
                ->save("$path/$filename");
        }

        Flash::success('Producto creado correctamente');

        return Redirect::route('admin_products_path', [$shop->link, $category->id]);
    }

    public function edit($shop_link, $category_id, $product_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();
        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();

        return View::make('shops.pages.admin.product.edit', compact('shop', 'category', 'product'));
    }

    public function update($shop_link, $category_id, $product_id)
    {
        $validation = Validator::make(Input::all(), Product::$rulesUpdate, Product::$validationMessages);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->first();
        $product = Product::where('id', '<>', $product_id)->where('name', Input::get('name'))->where('category_id', $category->id)->first();

        if (!is_null($product)) {
            $errors = new Illuminate\Support\MessageBag;
            $errors->add('message', 'El nombre del producto debe ser único');

            return Redirect::back()->withInput()->withErrors($errors);
        }

        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();

        if (Input::has('publish')) {

            $errors = new Illuminate\Support\MessageBag;

            if (!$product->photo_extension && !Input::hasFile('photo')) {
                $errors->add('message', 'El campo foto es obligatorio si se desea publicar el producto');

                return Redirect::back()->withInput()->withErrors($errors);
            }
        }


        $product->name = Input::get('name');
        $product->description = Input::get('description');
        if (Input::get('price'))
            $product->price = Input::get('price');
        else
            $product->price = NULL;

        $product->publish = Input::has('publish');
        if (Input::has('delivery_service')) {
            $product->delivery_service = "1";
        } else {
            $product->delivery_service = "0";
        }
        $product->save();

        if (Input::hasFile('photo')) {
            $photo = Input::file('photo');
            $product->photo_extension = $photo->getClientOriginalExtension();
            $product->save();

            $path = "shops/{$shop->id}/products/{$product->id}";
            if (!File::exists($path)) {
                File::makeDirectory($path);
            }

            $filename = 'mini.' . $product->photo_extension;
            Image::make($photo->getRealPath())
                ->fit(252, 126)
                ->save("$path/$filename");

            $filename = 'cover.' . $product->photo_extension;
            Image::make($photo->getRealPath())
                ->fit(900, 450)
                ->save("$path/$filename");
        }

        Flash::success('Producto actualizado correctamente');

        return Redirect::back();
    }


    public function destroy($shop_link, $category_id, $product_id)
    {
        $shop = Shop::where('link', $shop_link)->firstOrFail();
        $category = Category::where('id', $category_id)->where('shop_id', $shop->id)->firstOrFail();
        $product = Product::where('id', $product_id)->where('category_id', $category->id)->firstOrFail();
        $product->delete();

        $path = "shops/{$shop->id}/products/$product_id";
        if (File::isDirectory($path)) {
            File::deleteDirectory($path);
        }

        Flash::success('Producto eliminado correctamente');

        return Redirect::route('admin_products_path', [$shop->link, $category->id]);
    }


    public function show($shop_link, $category_name, $product_name)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->where('shop_id', $shop->id)->firstOrFail();
        $product = Product::where('name', $product_name)->where('publish', 1)->where('category_id', $category->id)->firstOrFail();
        $reviews = $product->reviews()->with('user')->orderBy('created_at', 'desc')->paginate(20);

        return View::make('shops.pages.product', compact('shop', 'category', 'product', 'reviews', 'reviews'));
    }


    public function saveReview($shop_link, $category_name, $product_name, $product_id)
    {
        if (!Auth::check()) {
            Flash::error('Debes estar autentificado para hacer una valoración');

            return Redirect::route('product_path', [$shop_link, $category_name, $product_name]);
        }

        $input = array(
            'comment' => Input::get('comment'),
            'rating' => Input::get('rating')
        );
        // instantiate Rating model
        $review = new Review;

        // Validate that the user's input corresponds to the rules specified in the review model
        $validator = Validator::make($input, Review::$rules, Review::$validationMessages);

        // If input passes validation - store the review in DB, otherwise return to product page with error message
        if ($validator->passes()) {
            $review->storeReviewForProduct($product_id, $input['comment'], $input['rating']);

            Flash::success('Gracias por valorar este producto');

            return Redirect::route('product_path', [$shop_link, $category_name, $product_name]);
        }

        return Redirect::route('product_path', [$shop_link, $category_name, $product_name])->withErrors($validator);

    }
}
