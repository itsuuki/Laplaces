<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'send',
        'recieve',
        'message',
        'title'
    ];
    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function shops()
    {
        return $this->hasMany('App\Shop');
    }
}
