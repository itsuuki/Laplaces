<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'image',
        'video',
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function commodity()
    {
        return $this->belongsTo('App\Commodity');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }
}
