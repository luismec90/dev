<?php

class Category extends \Eloquent {

    public static $rules = [
        'name' => 'required'
    ];

    public static $validationMessages = [
        'name.required' => 'El campo nombre es obligatorio',
    ];


    // Don't forget to fill this array
    protected $fillable = [];

    public function shop() {
        return $this->belongsTo('Shop');
    }

    public function products() {
        return $this->hasMany('Product');
    }

    public function publishedProducts() {
        return $this->hasMany('Product')->where('publish',1);
    }
}
