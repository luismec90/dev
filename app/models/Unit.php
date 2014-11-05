<?php

class Unit extends \Eloquent
{
    protected $fillable = [];

    public function Stocks()
    {
        return $this->hasMany('Stock');
    }
}