<?php
namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;

use App\Models;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Models\CustomerModel::all();
        $data['nome'] = $data['cpf'] = null;
        return view('ticket.customer.index', $data);
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
        $data['cpf'] = preg_replace('/\D/', '', Input::get('cpf'));
        
        $customer = Models\CustomerModel::where(1, 1);
        if (!empty($data['nome'])) {
            $customer->where('name', 'LIKE', "%{$data['nome']}%");
        }
        if (!empty($data['cpf'])) {
            $customer->where('cpf', '=', $data['cpf']);
        }
        $data['customers'] = $customer->get();

        return view('ticket.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.customer.create', ['id' => null, 'name' => null, 'cpf' => null]);
    }
    
    /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  Date  $myDate
     * @return \Illuminate\Support\Facades\Validator
     */
    public function customerValidation(Request $request, $myDate) {
        $validator = Validator::make(Input::all(), [
            'nome' => 'required',
            'cpf' => 'required'
        ]);
        
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
        $validator = $this->customerValidation(Input::all(), $myDate);
        if ($validator->fails()) {
            return redirect('admin/customer/create')
                ->withInput()
                ->withErrors($validator);
        } else {
            $customer = new Models\CustomerModel();
            $customer->name = Input::get('nome');
            $customer->cpf = preg_replace('/\D/', '', Input::get('cpf'));
            $customer->save();
            
            return redirect('admin/customer');
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
        $customer = Models\CustomerModel::find($id);
        return view('ticket.customer.show', $customer->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Models\CustomerModel::find($id);
        $data = $customer->toArray();
        return view('ticket.customer.create', $data);
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
        $validator = $this->customerValidation($request, $myDate);
        if ($validator->fails()) {
            return redirect("admin/customer/edit/{$id}")
                ->withInput()
                ->withErrors($validator);
        } else {
            $customer = Models\CustomerModel::find($id);
            $customer->name = Input::get('nome');
            $customer->cpf = preg_replace('/\D/', '', Input::get('cpf'));
            $customer->save();
            
            return redirect('admin/customer');
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
        Models\CustomerModel::find($id)->delete();
        return redirect('admin/customer');
    }
}
