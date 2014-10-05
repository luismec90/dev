<?php

class Cover extends \Eloquent {
	protected $fillable = [];

    public function shop() {
        return $this->belongsTo('Shop');
    }

    public function pathImage($shop_id) {
        return asset("shops/$shop_id/covers/{$this->image}");
    }
}