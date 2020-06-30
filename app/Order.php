<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function commodity()
    {
        return $this->belongsTo('App\Shop');
    }
}
