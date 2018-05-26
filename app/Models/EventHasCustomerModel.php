<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerModel;
use App\Models\EventModel;

class EventHasCustomerModel extends Model
{
    protected $table = 'event_has_customer';
   
    /**
    * Get the customer
    */
   public function customer()
   {
       return $this->belongsTo('App\Models\CustomerModel', 'customer_id');
   }
   
   /**
    * Get the event
    */
   public function event()
   {
       return $this->belongsTo('App\Models\EventModel', 'event_id');
   }
}
