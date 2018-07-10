<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
   public function tour_detail(){
       return $this->hasOne('App\TourDetail');
   }
}
