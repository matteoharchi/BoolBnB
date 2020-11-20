<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'house_id',
        'sender_mail',
        'object',
        'body'
    ];

    public function house(){
        return $this->belongsTo('App\House');
    }

}
