<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'users';

    public function barber()
    {
        return $this->belongsTo('App\Models\BarberModel');
    }
}
