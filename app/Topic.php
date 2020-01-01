<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public function myUser(){
        return $this->belongsTo(User::class);
    }

    public function myQuestion(){
        return $this->hasMany(Question::class);
    }
}
