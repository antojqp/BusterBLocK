<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Movie;
use User;


class Reserves extends Model
{
    //
    protected $fillable = [
        'reserUser', 'reserMov', 'reserStatus', 'reserCode'
    ];

    protected $hidden = [
        'created_at',
    ];
    public function user()
    {
        return $this->hasMany(User::class, "id");
    }
    public function movie()
    {
        return $this->hasMany(Movie::class, "id");
    }
}
