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

    public function pathImage($cover = false)
    {
        if ($cover)
            return asset("shops/{$this->category->shop_id}/products/1/cover.jpg");
        return asset("shops/{$this->category->shop_id}/products/1/mini.jpg");
    }

    public function price()
    {
        return '$ ' . number_format($this->price, 0, ',', '.');
    }

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews()->notSpam()->approved();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}
