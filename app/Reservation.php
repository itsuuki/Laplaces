<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'remark','form',
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commodity()
    {
        return $this->belongdTo('App\Commodity');
    }


}
