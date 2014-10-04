<?php

class Town extends \Eloquent
{
    protected $fillable = [];

    public function shops()
    {
        return $this->hasMany('Shop');
    }
}