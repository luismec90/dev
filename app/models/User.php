<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'birth_date' => 'required|date_format:Y-m-d',
        'gender' => 'required|in:f,m',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6'
    ];

    public static $updateRules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'birth_date' => 'required|date_format:Y-m-d',
        'gender' => 'required|in:f,m',
        'avatar' => 'image|max:2048'
    ];

    public static $updatePasswordRules = [
        'password' => 'required|confirmed|min:4',
        'old_password' => 'sometimes|required'
    ];

    public static $validationMessages = [
        'first_name.required' => 'El campo nombres es obligatorio',
        'last_name.required' => 'El campo apellidos es obligatorio',
        'birth_date.required' => 'El campo fecha de nacimiento es obligatorio',
        'birth_date.date_format' => 'El campo fecha de nacimiento no corresponde con el formato Y-m-d.',
        'gender.required' => 'El campo género es obligatorio',
        'gender.in' => 'El campo género seleccionado es inválido',
        'email.required' => 'El campo email es obligatorio',
        'password.required' => 'El campo contraseña es obligatorio',
        'password.confirmed' => 'El campo confirmar contraseña no coincide',
    ];


    public function shops()
    {
        return $this->belongsToMany('Shop')->withPivot('role');
    }

    public function isAdmin($shop_id)
    {
        $shop = $this->shops()->where('shop_id', $shop_id)->where('role', 1)->get();
        if ($shop->count())
            return true;
        return false;
    }

    public function isMember($shop_id)
    {
        $shop = $this->shops()->where('shop_id', $shop_id)->where('role', 2)->get();
        if ($shop->count())
            return true;
        return false;
    }

    public function rutaAvatar()
    {
        return asset('users/avatars/' . $this->avatar);
    }

    public function reviews()
    {
        return $this->hasMany('Review');
    }

}
