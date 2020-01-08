<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    // protected $guarded = ['id', '_token'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'address', 'birthday', 'profile_picture', 'isAdmin'
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

    //satu user bisa punya banyak topic
    public function Topic(){
        return $this->hasMany(Topic::class);
    }

    public function Question(){
        return $this->hasMany(Question::class);
    }

    public function Message(){
        return $this->hasMany(Message::class);
    }
}
