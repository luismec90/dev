<?php

class Notification extends \Eloquent {

    protected $fillable = [];

    public function shos()
    {
        return $this->belongsTo('Shop');
    }
}