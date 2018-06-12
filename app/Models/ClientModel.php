<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'clients';

    public function coupons()
    {
        return $this->hasMany('App\Models\CouponModel','client_id');
    }

    public function couponsValid()
    {
        return $this->hasMany('App\Models\CouponModel','client_id')->where('status', 0);
    }
}
