<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'birth_date',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /****************************************************
     * Relations
    ****************************************************/

    public function messages()
    {
        return $this->hasManyThrough(
            'App\Message', // Final Model
            'App\Place', // Intermediary Model
            'user_id', // Intermediary Model Foreign Key
            'place_id', // Final Model Foreign Key
            'id', // User Model Primary Key
            'id' // Intermediary Model Primary Key
        );  
    }

    public function places(){
        return $this->hasMany('App\Place');
    }

}
