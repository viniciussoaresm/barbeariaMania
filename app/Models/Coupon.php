<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function clients()
    {
        return $this->belongsTo(Coupon::class);
    }
}
