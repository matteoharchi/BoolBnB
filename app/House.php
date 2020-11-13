<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'slug',
        'rooms',
        'beds',
        'bathrooms',
        'size',
        'address',
        'img',
        'long',
        'lat',
        'visible',
        'price'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor')->withPivot('house_id', 'sponsor_id', 'start_date', 'end_date');
    }

}

