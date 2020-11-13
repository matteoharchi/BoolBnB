<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'price',
      ];
  
      public function houses() {
          return $this->belongsToMany('App\House')->withPivot('house_id', 'sponsor_id', 'start_date', 'end_date');
      }
}
