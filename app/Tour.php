<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function tour_detail(){
       return $this->hasOne('App\TourDetail');
    }    

   public function bookings(){
       return $this->hasMany('App\Booking');
   }

}
