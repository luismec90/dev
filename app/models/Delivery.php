<?php

class Delivery extends \Eloquent {
	protected $fillable = [];


    public static $rules = [
        'phone' => 'required',
        'address' => 'required'
    ];


    public static $validationMessages = [
        'phone.required' => 'El campo télefono es obligatorio',
        'address.date_format' => 'El campo dirección es obligatorio',
    ];
}