<?php

class Product extends \Eloquent
{

    public static $rules = [
        'photo' => 'required_if:publish,1|image|max:4000',
        'name' => 'required',
        'price' => 'sometimes|numeric'

    ];

    public static $rulesUpdate = [
        'name' => 'required',
        'price' => 'sometimes|numeric',
        'photo' => 'sometimes|image|max:4000'
    ];

    public static $validationMessages = [
        'name.required' => 'El campo nombre es obligatorio',
        'price.required' => 'El campo precio es obligatorio',
        'price.numeric' => 'El campo precio debe ser un número',
        'photo.required_if' => 'El campo foto es obligatorio cuando si se desea publicar el producto',
        'photo.image' => 'El campo foto debe ser una imagen',
        'photo.max' => 'La foto del producto debe pesar menos de 4MB',
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function purchase()
    {
        return $this->hasOne('Purchase');
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

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating, 1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}
