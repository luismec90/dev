<?php

class AllianceRecord extends \Eloquent {

    protected $fillable = ['alliance_id',
        'shop_id',
        'from_retribution_per_user_granted',
        'from_limit_per_user_granted',
        'from_limit_total_granted',
        'to_retribution_per_user_granted',
        'to_limit_per_user_granted',
        'to_limit_total_granted',
        'note'];

    public function alliance()
    {
        return $this->belongsTo('Alliance');
    }

    public function shop()
    {
        return $this->belongsTo('Shop');
    }
}