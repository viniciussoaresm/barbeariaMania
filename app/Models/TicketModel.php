<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    protected $table = 'tickets';

    public function client()
    {
        return $this->belongsTo('App\Models\ClientModel');
    }
}
