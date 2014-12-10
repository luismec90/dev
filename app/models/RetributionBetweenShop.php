<?php

class RetributionBetweenShop extends \Eloquent {

    protected $fillable = [];


    public function shopWhoDistributes()
    {
        return $this->belongsTo('Shop', 'shop_who_distributes');
    }

    public function shopWhoGives()
    {
        return $this->belongsTo('Shop', 'shop_who_gives');
    }

}