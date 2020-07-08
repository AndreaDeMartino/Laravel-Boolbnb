<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name'
    ];


    /****************************************************
    * Relations
    ****************************************************/

    // Places (many to many)
    public function places(){
        return $this->belongsToMany('App\Place');
    }
}
