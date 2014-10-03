<?php

class ProductsController extends \BaseController
{

    public function show($shop_link, $category_name, $product_name)
    {
        $shop = Shop::with('categories')->where('link', $shop_link)->firstOrFail();
        $category = Category::with('products')->where('name', $category_name)->firstOrFail();
        $product = Product::where('name', $product_name)->firstOrFail();
        $reviews = $product->reviews()->with('user')->orderBy('created_at', 'desc')->paginate(20);

        return View::make('shops.themes.one.product', compact('shop', 'category', 'product', 'reviews', 'reviews'));
    }

    public function adminEdit($shop_name, $category_name, $product_name)
    {
        $shop = Shop::where('name', $shop_name)->firstOrFail();
        $category = Category::where('name', $category_name)->firstOrFail();
        $product = Product::where('name', $product_name)->firstOrFail();

        return View::make('shops.themes.admin.product.edit', compact('shop', 'category', 'product'));
    }

    public function adminUpdate($shop_name, $category_name, $product_name)
    {

        $product = Product::where('name', $product_name)->firstOrFail();
        $product->name = Input::get('name');
        $product->save();

        Flash::success('Producto editado correctamente');

        return Redirect::route('admin_edit_product_path', [$shop_name, $category_name, $product->name]);
    }

    public function saveReview($product_id)
    {
        $input = array(
            'comment' => Input::get('comment'),
            'rating' => Input::get('rating')
        );
        // instantiate Rating model
        $review = new Review;

        // Validate that the user's input corresponds to the rules specified in the review model
        $validator = Validator::make($input, $review->getCreateRules());

        // If input passes validation - store the review in DB, otherwise return to product page with error message
        if ($validator->passes()) {
            $review->storeReviewForProduct($product_id, $input['comment'], $input['rating']);
        //    return Redirect::to('products/' . $product_id . '#reviews-anchor')->with('review_posted', true);
        }

      //  return Redirect::to('products/' . $product_id . '#reviews-anchor')->withErrors($validator)->withInput();
    }
}
