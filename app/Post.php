<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
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
}
