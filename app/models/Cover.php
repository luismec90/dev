<?php

class Cover extends \Eloquent {


    public static $rules = [
        'photo'=>'required|image|max:4000',
    ];

    public static $rulesUpdate = [
        'photo'=>'sometimes|image|max:4000'
    ];

    public static $validationMessages = [
        'photo.required' => 'El campo cover es obligatorio',
        'photo.image' => 'El campo cover debe ser una imagen',
        'photo.max' => 'El cover debe pesar menos de 4MB',
    ];

    protected $fillable = [];

    public function shop() {
        return $this->belongsTo('Shop');
    }

    public function pathImage($shop_id) {
        return asset("shops/$shop_id/covers/{$this->image}");
    }
}