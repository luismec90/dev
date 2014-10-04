<?php

class Activity extends \Eloquent {
	protected $fillable = [];

    public function shops()
    {
        return $this->belongsToMany('Shop');
    }
}