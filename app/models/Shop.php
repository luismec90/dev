<?php

class Shop extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];

    public function categories() {
        return $this->hasMany('Category');
    }

    public function covers() {
        return $this->hasMany('Cover');
    }

    public function town() {
        return $this->belongsTo('Town');
    }

    public function activities()
    {
        return $this->belongsToMany('Activity');
    }

    public function pathPreviwImage()
    {
        return asset("shops/{$this->id}/{$this->image_preview}");
    }

    public function users()
    {
        return $this->belongsToMany('User')->withPivot('role');
    }

}
