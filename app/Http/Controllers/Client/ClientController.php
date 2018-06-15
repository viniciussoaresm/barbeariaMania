<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Models;
use App\Models\ClientModel as Client;
use App\Models\CouponModel as Coupon;
use App\Models\TicketModel as Ticket;

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

        $coupons = Client::find($user->id)->coupons->take(8);

        $validCoupons = Client::find($user->id)->couponsValid;

        $tickets = Client::find($user->id)->tickets;

        $ticketsPending  = (int)($validCoupons->count()/8)*1;        

        $percentage = ($validCoupons->count()*100)/8;

        $aa = Coupon::where('client_id','=',$request->client)->where('status','=','0')->orderBy('registration_date','ASC')->get();

        return view('site.client.panel')->with(compact('coupons','validCoupons','user','percentage','tickets','ticketsPending'));    
    }

    public function generateTicket(Request $request)
    {
        $return = false; 
        $validCoupons = Coupon::where('client_id','=',$request->client)->where('status','=','0')->orderBy('registration_date','ASC')->get();

        if($validCoupons->count() >= 8){

            foreach($validCoupons as $i => $coupon){
                if($i >= 8){
                    break;
                }
                $coupon->status = 1;
                $return = $coupon->save();
            }

            if($return){
                $ticket = new Ticket();
                $ticket->client = $request->client;
                $ticket->registration_date = date('Y-m-d');
                $ticket->code = md5(date('Y-m-d'));
                $ticket->valid_date =  \Carbon\Carbon::now()->addDay(90)->format('Y-m-d');
                if($ticket->save()){
                    return response()
                    ->json(['result' => true]);
                }
            }  

         
        }

        return response()
        ->json(['result' => false]);   
    }
    

  

}
