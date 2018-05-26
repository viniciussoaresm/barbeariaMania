<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;

use App\Models;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = Models\EventModel::all();
        $data['nome'] = $data['data'] = $data['lotacao_maxima'] = $data['tipo_evento'] = $data['status'] = null;
        $data['filtro_status'] = true;
        return view('ticket.event.index', $data);
    }
    
    /**
     * List of events site
     *
     * @return \Illuminate\Http\Response
     */
    public function listEvents()
    {
        $data['events'] = Models\EventModel::where('status', 'P')->where('date', '>', date('Y-m-d'))->get();
        $data['nome'] = $data['data'] = $data['lotacao_maxima'] = $data['tipo_evento'] = $data['status'] = null;
        return view('ticket.event.list', $data);
    }
    
    /**
     * Buy event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buy($id)
    {
        $data = Models\EventModel::find($id)->toArray();
        $data['purchased_tickets'] = Models\EventModel::find($id)->tickets->count();
        return view('ticket.event.buy', $data);
    }
    
    /**
     * Buy event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, $id)
    {
        $nome = Input::get('nome');
        $cpf = preg_replace('/\D/', '', Input::get('cpf'));
        
        $validator = Validator::make(Input::all(), [
            'nome' => 'required',
            'cpf' => 'required|min:11'
        ]);
        
        if ($validator->fails()) {
            return redirect("event/buy/{$id}")
                ->withInput()
                ->withErrors($validator);
        } else {
            $customer = Models\CustomerModel::where('cpf', $cpf)->first();
            
            if (!$customer) {
                $customer = new Models\CustomerModel();
                $customer->name = $nome;
                $customer->cpf = $cpf;
                $customer->save();
            }
            
            $eventHasCustomer = Models\EventHasCustomerModel::where('customer_id', $customer->id)->where('event_id', $id)->first();
            if (!$eventHasCustomer) {
                $eventHasCustomer = new Models\EventHasCustomerModel();
                $eventHasCustomer->customer_id = $customer->id;
                $eventHasCustomer->event_id = $id;
                $eventHasCustomer->save();
            }
            
            $data['name'] = $eventHasCustomer->customer->name;
            $data['cpf'] = $eventHasCustomer->customer->cpf;
            $data['event_name'] = $eventHasCustomer->event->name;
            $data['event_date'] = $eventHasCustomer->event->date;
            $data['id_ticket'] = $eventHasCustomer->id;
            return view('ticket.event.success', $data);
        }
    }
    
    /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data['nome'] = Input::get('nome');
        $data['data'] = Input::get('data');
        $data['lotacao_maxima'] = Input::get('lotacao_maxima');
        $data['tipo_evento'] = Input::get('tipo_evento');
        $data['status'] = Input::get('status');
        
        $event = Models\EventModel::where(1, 1);
        if (!empty($data['nome'])) {
            $event->where('name', 'LIKE', "%{$data['nome']}%");
        }
        if (!empty($data['data'])) {
            $event->where('date', '=', date('Y-m-d', strtotime(str_replace('/', '-', $data['data']))));
        }
        if (!empty($data['lotacao_maxima'])) {
            $event->where('maximum_capacity', '=', $data['lotacao_maxima']);
        }
        if (!empty($data['tipo_evento'])) {
            $event->where('type', '=', $data['tipo_evento']);
        }
        if (!empty($data['status'])) {
            $event->where('status', '=', $data['status']);
        }
        $data['events'] = $event->get();
        
        if ($request->route()->getPrefix() == '/admin') {
            $data['filtro_status'] = true;
            return view('ticket.event.index', $data);
        } else {
            return view('ticket.event.list', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('views/create.html', ['id' => null, 'name' => null, 'date' => null, 'manager' => null, 'type' => null, 'description' => null, 'maximum_capacity' => null, 'status' => null]);
    }
    
    /**
     * 
     * @param  Date  $myDate
     * @return \Illuminate\Support\Facades\Validator
     */
    public function eventValidation($myDate) {
        $validator = Validator::make(Input::all(), [
            'nome' => 'required',
            'data' => 'required',
            'lotacao_maxima' => 'required|numeric',
            'organizador' => 'required',
            'tipo_evento' => 'required',
            'descricao' => 'required',
            'status' => 'required'
        ]);
        
        $validator->after(function ($validator) use ($myDate) {
            $currentDate = date('Y-m-d');
            if ($currentDate >= $myDate) {
                $validator->errors()->add('date', 'Por favor, digite uma data maior que o dia atual.');
            }
        });
        
        return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myDate = date('Y-m-d', strtotime(str_replace('/', '-', Input::get('data'))));
        $validator = $this->eventValidation($myDate);
        if ($validator->fails()) {
            return redirect('admin/event/create')
                ->withInput()
                ->withErrors($validator);
        } else {
            $event = new Models\EventModel();
            $event->name = Input::get('nome');
            $event->date = $myDate;
            $event->maximum_capacity = Input::get('lotacao_maxima');
            $event->manager = Input::get('organizador');
            $event->type = Input::get('tipo_evento');
            $event->description = Input::get('descricao');
            $event->status = Input::get('status');
            $event->save();
            
            return redirect('admin/event');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Models\EventModel::find($id)->toArray();
        $data['purchased_tickets'] = Models\EventModel::find($id)->tickets->count();
        return view('ticket.event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Models\EventModel::find($id);
        $data = $event->toArray();
        $data['date'] = date('d/m/Y', strtotime($data['date']));
        return view('ticket.event.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myDate = date('Y-m-d', strtotime(str_replace('/', '-', Input::get('data'))));
        $validator = $this->eventValidation($myDate);
        if ($validator->fails()) {
            return redirect("admin/event/edit/{$id}")
                ->withInput()
                ->withErrors($validator);
        } else {
            $event = Models\EventModel::find($id);
            $event->name = Input::get('nome');
            $event->date = $myDate;
            $event->maximum_capacity = Input::get('lotacao_maxima');
            $event->manager = Input::get('organizador');
            $event->type = Input::get('tipo_evento');
            $event->description = Input::get('descricao');
            $event->status = Input::get('status');
            $event->save();
            
            return redirect('admin/event');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Models\EventModel::find($id)->delete();
        return redirect('admin/event');
    }
    
    /**
     * Published the event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function published($id)
    {
        $user = Models\EventModel::find($id);   
        $currentDate = date('Y-m-d');
        $myDate = date('Y-m-d', strtotime($user->date));
        if ($currentDate >= $myDate) {
            return redirect('admin/event')->withErrors(['errors' => 'Não é possível publicar um evento com a data menor ou igual data atual.']);
        } else {
            $user->status = 'P';
            $user->save();
            return redirect('admin/event');
        }
    }
    
    /**
     * Unpublished the event
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublished($id)
    {
        $user = Models\EventModel::find($id);   
        $currentDate = date('Y-m-d');
        $myDate = date('Y-m-d', strtotime($user->date));
        if ($currentDate >= $myDate) {
            return redirect('admin/event')->withErrors(['errors' => 'Não é possível publicar um evento com a data menor ou igual data atual.']);
        } else {
            $user->status = 'N';
            $user->save();
            return redirect('admin/event');
        }
    }
}
