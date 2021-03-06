<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    private $is_admin = null;
    private $is_member = null;

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
        'last_name'  => 'required',
        'birth_date' => 'sometimes|date_format:Y-m-d',
        'gender'     => 'sometimes|in:f,m',
        'email'      => 'required|email|unique:users',
        'password'   => 'required|confirmed|min:4'
    ];

    public static $rulesCompleteRegister = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'birth_date' => 'sometimes|date_format:Y-m-d',
        'gender'     => 'required|in:f,m',
        'email'      => 'required|email',
        'password'   => 'required|confirmed|min:4'
    ];

    public static $updateRules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'birth_date' => 'sometimes|date_format:Y-m-d',
        'gender'     => 'required|in:f,m',
        'avatar'     => 'image|max:2048',
        'code'       => 'required|integer|digits:4'
    ];

    public static $updatePasswordRules = [
        'password'     => 'required|confirmed|min:4',
        'old_password' => 'sometimes|required'
    ];

    public static $validationMessages = [
        'first_name.required'    => 'El campo nombres es obligatorio',
        'last_name.required'     => 'El campo apellidos es obligatorio',
        'birth_date.date_format' => 'El campo fecha de nacimiento no corresponde con el formato Y-m-d.',
        'gender.required'        => 'El campo género es obligatorio',
        'gender.in'              => 'El campo género seleccionado es inválido',
        'email.email'            => 'El campo email  es inválido',
        'email.required'         => 'El campo email es obligatorio',
        'email.unique'           => 'El campo email ya ha sido tomado',
        'password.required'      => 'El campo contraseña es obligatorio',
        'password.confirmed'     => 'El campo confirmar contraseña no coincide',
        'code.required'          => 'El campo código de verificación es obligatorio',
        'code.integer'           => 'El campo código debe contener solo números',
        'code.digits'            => 'El campo código debe tener 4 caracteres',
        'password.min'           => 'El campo contraseña debe tener al menos 4 caracteres',
    ];


    public function fullName()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function shops()
    {
        return $this->belongsToMany('Shop')->withPivot('role');
    }

    public function bills()
    {
        return $this->hasMany('Bill');
    }

    public function isAdmin($shop_id)
    {
        if (is_null($this->is_admin))
        {
            $shop = $this->shops()->where('shop_id', $shop_id)->where('role', 1)->get();
            if ($shop->count())
            {
                $this->is_admin = true;

                return true;
            }
            $this->is_admin = false;

            return false;
        } else
        {
            return $this->is_admin;
        }

    }

    public function isMember($shop_id)
    {
        if (is_null($this->is_member))
        {
            $shop = $this->shops()->where('shop_id', $shop_id)->where('role', 2)->get();
            if ($shop->count())
            {
                $this->is_member = true;

                return true;
            }
            $this->is_member = false;

            return false;

        } else
        {
            return $this->is_member;
        }
    }

    public function rutaAvatar()
    {
        return asset('users/avatars/' . $this->avatar);
    }

    public function reviews()
    {
        return $this->hasMany('Review');
    }

    public function notifications()
    {
        return $this->hasMany('Notification')->orderBy('created_at', 'desc');
    }

    public function newNotifications()
    {
        return $this->hasMany('Notification')->orderBy('created_at', 'desc')->where('viewed', 0);
    }

    public function saldo($shop_id)
    {
        $shop = Shop::findOrFail($shop_id);

        $balance = DB::table('bills')->select(DB::raw('COALESCE(SUM(retribution-redeemed),0) as retribution'))
            ->where('shop_id', $shop->id)
            ->where('user_id', $this->id)
            ->whereNull('deleted_at')
            ->where('created_at', '>=', Carbon::now()->subDays($shop->balance_deadline))
            ->first();

        $balanceByAlliances = DB::table('retribution_between_shops')->select(DB::raw('COALESCE(SUM(retribution),0) as retribution'))
            ->where('shop_who_gives', $shop->id)
            ->where('user_id', $this->id)
            ->where('created_at', '>=', Carbon::now()->subDays(60))
            ->first();

        return $balance->retribution + $balanceByAlliances->retribution;
    }

    public static function linkUserEmail($user_id, $shop_id)
    {
        $user = User::findOrFail($user_id);

        if (Auth::check() && Auth::user()->isAdmin($shop_id))
        {
            return "<a class='info-user' data-user='{$user->id}' data-shop='$shop_id'>{$user->email}</a>";
        } else
        {
            return $user->email;
        }
    }

}
