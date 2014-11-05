<?php

class Stock extends \Eloquent
{
    protected $fillable = [];

    public static $rules = [
        'unit_id' => 'required|exists:units,id',
        'name' => 'required',
        'trigger' => 'sometimes|numeric',
    ];

    public static $rulesUpdate = [

    ];

    public static $validationMessages = [
        'name.required' => 'El campo nombre es obligatorio',
        'unit_id.required' => 'El campo unidad es obligatorio',
        'unit_id.exists' => 'El campo unidad seleccionado es inválido',
        'trigger.numeric' => 'El campo umbral debe ser un número'
    ];

    public function shop()
    {
        return $this->belongsTo('Shop');
    }

    public function unit()
    {
        return $this->belongsTo('Unit');
    }

    public function historic()
    {
        return $this->hasMany('stockHistory');
    }

    public function products()
    {
        return $this->belongsToMany('Product')->withPivot('stock_spent');
    }
}