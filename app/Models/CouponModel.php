<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'coupons';

    public function client()
    {
        return $this->belongsTo('App\Models\ClientModel');
    }
    
}
