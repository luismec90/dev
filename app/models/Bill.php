<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Bill extends \Eloquent {

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    public static $rules = [
        'email' => 'required_if:register_products,1|email',
        'date' => 'required|date_format:Y-m-d',
    ];


    public static $validationMessages = [
        'email.required' => 'El campo email es obligatorio',
        'email.email' => 'El campo email no es válido',
        'date.required' => 'El campo fecha es obligatorio'
    ];

    public function user() {
        return $this->belongsTo('User');
    }

    public function purchases() {
        return $this->hasMany('Purchase');
    }

}