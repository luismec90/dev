<?php

class Shop extends \Eloquent {


    public static $createRules = [
        'name'               => 'required',
        'link'               => 'required|alpha_dash|unique:shops',
        'town_id'            => 'required|exists:towns,id',
        'email'              => 'required|email',
        'administrator_name' => 'required',
        'cell'               => 'required',

    ];

    public static $updateRules = [
        'name'             => 'required',
        'link'             => 'required',
        'balance_deadline' => 'required|integer|between:0,9999',
        'lat'              => 'required',
        'lng'              => 'required',
        'retribution'      => 'required|integer|between:0,100',
    ];


    public static $validationMessages = [
        'name.required'             => 'El campo nombre es obligatorio',
        'link.required'             => 'El campo link es obligatorio',
        'town_id.required'          => 'El ubicación es obligatorio',
        'lat.required'              => 'El campo lat es obligatorio',
        'lng.required'              => 'El campo lng es obligatorio',
        'retribution.required'      => 'El campo retribution es obligatorio',
        'balance_deadline.required' => 'El campo días de vigencia del saldo es obligatorio',
        'email.required'            => 'El campo e-mail es obligatorio',
        'phone.required'            => 'El campo phone es obligatorio',
        'schedule.required'         => 'El campo schedule es obligatorio',
        'about.required'            => 'El campo about es obligatorio',
        'retribution.integer'       => 'El campo retribución debe ser un número entero entre 1 y 100',
        'retribution.between'       => 'El campo retribución debe ser un número entero entre 1 y 100',
        'balance_deadline.integer'  => 'El campo días de vigencia del saldo debe ser un número entero entre 0 y 9999',
        'balance_deadline.between'  => 'El campo días de vigencia del saldo debe ser un número entero entre 0 y 9999',
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public function categories()
    {
        return $this->hasMany('Category');
    }

    public function covers()
    {
        return $this->hasMany('Cover');
    }

    public function town()
    {
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
        if ($this->image_preview != "")
            return asset("shops/{$this->id}/{$this->image_preview}");
        else
            return "http://dummyimage.com/200/e74c3c/ffffff&text=LS";
    }

    public function users()
    {
        return $this->belongsToMany('User')->withPivot('role');
    }

    public function admins()
    {
        return $this->belongsToMany('User')->withPivot('role')->wherePivot('role', 1);
    }


    public static function showMoney($amount)
    {
        if ($amount)
            return '$ ' . number_format($amount, 0, ',', '.');
        else
            return '--';
    }

}
