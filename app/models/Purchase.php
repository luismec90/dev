<?php

class Purchase extends \Eloquent {
	protected $fillable = [];

    public function bill() {
        return $this->belongsTo('Bill');
    }
}