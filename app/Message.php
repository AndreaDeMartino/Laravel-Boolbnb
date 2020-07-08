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

    public $timestamps = false;
  /****************************************************
  * Relations
  ****************************************************/

    // Places (one to many)
    public function place(){
        return $this->belongsTo('App\Place');
    }
}
