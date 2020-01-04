<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    // protected $guarded = ['id', '_token'];

    protected $fillable = ['user_id', 'nameTopic'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Question(){
        return $this->hasMany(Question::class);
    }
}
