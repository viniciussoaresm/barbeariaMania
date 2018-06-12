<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Models;
use App\Models\ClientModel as Client;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
   
    /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       $client = new Client;

       $client->name = $request->name;
       $client->email = $request->email;
       $client->document = $request->document;
       $client->cellphone = $request->cellphone;
       $client->city = $request->city;
       $client->state = $request->state;
       $client->address = $request->address;
       $client->zipcode = $request->zipcode;
       $client->password = $request->password;
       $client->password = $this->encriptPassword($request->password);
       $client->birthday = $request->birthday;

       echo $client->save();

       return redirect()->action('Client\ClientController@panel');
    }

    public function panel(Request $request)
    {
        $user = $request->session()->get('user');
        if(!$request->session()->get('user')){
            return redirect()->action('Site\SiteController@login');
        }

        $coupons = Client::find($user->id)->coupons;

        $validCoupons = Client::find($user->id)->couponsValid;

        $tickets = (int)($validCoupons->count()/8)*1;        

        $percentage = ($validCoupons->count()*100)/8;

        return view('site.client.panel')->with(compact('coupons','validCoupons','user','percentage','tickets'));    
    }

  

}
