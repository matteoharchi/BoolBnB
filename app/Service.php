<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function houses(){
        return $this->belongsToMany('App\House');
    }
}
