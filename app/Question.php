<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    // protected $guarded = ['id', '_token'];

    protected $fillable = ['topic_id', 'question', 'questionStatus', 'user_id', 'questionCreationDate'];

    public function Topic(){
        return $this->belongsTo(Topic::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Answer(){
        return $this->hasMany(Answer::class);
    }
}
