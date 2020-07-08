<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    /****************************************************
    * Relations
    ****************************************************/

    // Places (many to many)
    public function places(){
        return $this->belongsToMany('App\Place');
    }


}
