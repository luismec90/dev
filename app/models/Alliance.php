<?php

class Alliance extends \Eloquent {

    protected $fillable = ['from',
        'to',
        'from_retribution_per_user_granted',
        'from_limit_per_user_granted',
        'from_limit_total_granted',
        'to_retribution_per_user_granted',
        'to_limit_per_user_granted',
        'to_limit_total_granted'];

    public static $rules = [
        'from'                              => 'required',
        'to'                                => 'required',
        'from_retribution_per_user_granted' => 'required|numeric',
        'from_limit_per_user_granted'       => 'required|numeric',
        'from_limit_total_granted'          => 'sometimes|numeric',
        'to_retribution_per_user_granted'   => 'required|numeric',
        'to_limit_per_user_granted'         => 'required|numeric',
        'to_limit_total_granted'            => 'sometimes|numeric'
    ];

}