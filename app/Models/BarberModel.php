<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarberModel extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'barbers';
}
