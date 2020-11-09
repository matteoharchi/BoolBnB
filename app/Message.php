<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id', 'house_id', 'sender_mail', 'object','body'
    ];

    public function house(){
        return $this->belongsTo('App\House');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
