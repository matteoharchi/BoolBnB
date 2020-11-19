<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    public $timestamps = false;
    protected $fillable = [
        'house_id',
        'sponsor_id',
        'start_date',
        'end_date',
    ];

    public function house() {
        return $this->belongsTo('App\House');
    }

    public function sponsor() {
        return $this->belongsTo('App\Sponsor');
    }

}
