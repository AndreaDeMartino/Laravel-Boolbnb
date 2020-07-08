<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'place_id',
        'guest_name',
        'mail_address',
        'subject',
        'message'
    ];


  /****************************************************
  * Relations
  ****************************************************/

    // Places (one to many)
    public function place(){
        return $this->belongsTo('App\Place');
    }
}
