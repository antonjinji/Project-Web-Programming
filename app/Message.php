<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['sender_id', 'user_receive_id', 'message', 'messageCreationDate'];

    public function User(){
        return $this->belongsTo(User::class, 'sender_id');
    }
}
