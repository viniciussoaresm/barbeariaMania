<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;

use App\Models;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Models\EventModel::all();
        foreach ($events as $i => $event) {
            $event->total =  Models\EventHasCustomerModel::where('event_id', $event->id)->count();
        }
        return view('ticket.ticket.index', ['tickets' => $events]);
    }
}
