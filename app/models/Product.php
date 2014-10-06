<?php

class Product extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function reviews()
    {
        return $this->hasMany('Review');
    }

    public function pathImage($cover, $category_id, $product_id)
    {
    //$product_id = 1;
        if ($cover)
            return asset("shops/$category_id/products/$product_id/cover.jpg");
        return asset("shops/$category_id/products/$product_id/mini.jpg");
    }

    public function price()
    {
        return '$ ' . number_format($this->price, 0, ',', '.');
    }

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating, 1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}
