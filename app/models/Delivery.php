<?php

class Delivery extends \Eloquent {
	protected $fillable = [];


    public static $rules = [
        'phone' => 'required',
        'category' => 'required',
        'product' => 'required',
        'address' => 'required'
    ];


    public static $validationMessages = [
        'phone.required' => 'El campo télefono es obligatorio',
        'category.required' => 'El campo categoría es obligatorio',
        'product.required' => 'El campo producto es obligatorio',
        'address.date_format' => 'El campo dirección es obligatorio',
    ];
}