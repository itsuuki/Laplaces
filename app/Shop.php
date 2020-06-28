<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'sname',
        'region',
        'sprice',
        'detail',
        'store_in',
        'take_out',
        'delivery',
    ];

    public function commodities()
    {
        return $this->hasMany('App\Commodity');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'favorites', 'shop_id', 'user_id');
    }


    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
