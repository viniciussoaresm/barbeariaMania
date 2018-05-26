<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'event';
    
    public function tickets()
    {
        return $this->hasMany('App\Models\EventHasCustomerModel', 'event_id');
    }
}
