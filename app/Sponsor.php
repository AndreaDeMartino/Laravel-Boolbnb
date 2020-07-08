<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration'
    ];

    // Places (many to many)
    public function places(){
        return $this->belongsToMany('App\Place');
    }

    public $timestamps = false;
}
