<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
