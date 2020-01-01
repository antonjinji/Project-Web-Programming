<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function myTopic(){
        return $this->belongsTo(Topic::class);
    }

    public function myAnswer(){
        return $this->hasMany(Answer::class);
    }
}
