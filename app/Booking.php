<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function tour(){
        return $this->belongsTo('App\Tour');
    }

    public function notifycation(){
        return $this->hasOne('App\Notification');
    }
}
