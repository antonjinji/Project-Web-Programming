<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    // protected $guarded = ['id', '_token'];

    protected $fillable = ['question_id', 'answer', 'user_id', 'answerCreateDate'];

    public function Question(){
        return $this->belongsTo(Question::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
