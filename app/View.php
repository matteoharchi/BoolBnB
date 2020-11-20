<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'house_id', 'view_date'
    ];
    public function house(){
        return $this->belongsTo('App\House');
    }
}
