<?php

class Bill extends \Eloquent {
	protected $fillable = [];

    public static $rules = [
        'email' => 'required|email'
    ];


    public static $validationMessages = [
        'email.required' => 'El campo email es obligatorio',
        'email.email' => 'El campo email no es válido'
    ];

    public function user() {
        return $this->belongsTo('User');
    }

    public function purchases() {
        return $this->hasMany('Purchase');
    }

}