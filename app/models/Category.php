<?php

class Category extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];

    public function shop() {
        return $this->belongsTo('Shop');
    }

    public function products() {
        return $this->hasMany('Product');
    }

}
