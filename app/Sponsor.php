<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model {
    protected $fillable = [
        'name',
        'duration',
        'price',
    ];

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
