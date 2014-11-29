<?php

class Shop extends \Eloquent {

    public static $rules = [
        'name' => 'required',
        'link' => 'required',
        'balance_deadline' => 'required|integer|between:0,9999',
        'lat' => 'required',
        'lng'=>'required',
        'retribution'=>'required|integer|between:0,100',
    ];


    public static $validationMessages = [
        'name.required' => 'El campo nombre es obligatorio',
        'link.required' => 'El campo link es obligatorio',
        'lat.required' => 'El campo lat es obligatorio',
        'lng.required'=>'El campo lng es obligatorio',
        'retribution.required'=>'El campo retribution es obligatorio',
        'balance_deadline.required'=>'El campo días de vigencia del saldo es obligatorio',
        'email.required'=>'El campo email es obligatorio',
        'phone.required'=>'El campo phone es obligatorio',
        'schedule.required'=>'El campo schedule es obligatorio',
        'about.required'=>'El campo about es obligatorio',
        'retribution.integer'=>'El campo retribución debe ser un número entero entre 1 y 100',
        'retribution.between'=>'El campo retribución debe ser un número entero entre 1 y 100',
        'balance_deadline.integer'=>'El campo días de vigencia del saldo debe ser un número entero entre 0 y 9999',
        'balance_deadline.between'=>'El campo días de vigencia del saldo debe ser un número entero entre 0 y 9999',
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public function categories() {
        return $this->hasMany('Category');
    }

    public function covers() {
        return $this->hasMany('Cover');
    }

    public function town() {
        return $this->belongsTo('Town');
    }

    public function activities()
    {
        return $this->belongsToMany('Activity');
    }

    public function stocks()
    {
        return $this->hasMany('Stock');
    }

    public function pathPreviwImage()
    {
        return asset("shops/{$this->id}/{$this->image_preview}");
    }

    public function users()
    {
        return $this->belongsToMany('User')->withPivot('role');
    }

    public function notifications()
    {
        return $this->hasMany('Notification')->orderBy('created_at', 'desc')->where('viewed',0);
    }

    public static function showMoney($amount){
        if($amount)
            return '$ '.number_format($amount,0,',','.');
        else
            return '--';
    }

}
