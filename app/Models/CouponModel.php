<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{

    protected $table = 'coupons';

    public function client()
    {
        return $this->belongsTo('App\Models\ClientModel');
    }

    public function barber()
    {
        return $this->belongsTo('App\Models\BarberModel');
    }
    
}
