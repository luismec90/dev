<?php

class Product extends \Eloquent
{

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'price'=>'required|numeric',
        'photo'=>'required|image|max:4000'
    ];

    public static $rulesUpdate = [
        'name' => 'required',
        'description' => 'required',
        'price'=>'required|numeric',
        'photo'=>'sometimes|image|max:4000'
    ];

    public static $validationMessages = [
        'name.required' => 'El campo nombre es obligatorio',
        'description.required' => 'El campo descripción es obligatorio',
        'price.required' => 'El campo precio es obligatorio',
        'price.numeric' => 'El campo precio debe ser un número',
        'photo.required' => 'El campo foto es obligatorio',
        'photo.image' => 'El campo foto debe ser una imagen',
        'photo.max' => 'La foto del producto debe pesar menos de 4MB',
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
            return asset("shops/$category_id/products/$product_id/cover.{$this->photo_extension}");
        return asset("shops/$category_id/products/$product_id/mini.{$this->photo_extension}");
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
