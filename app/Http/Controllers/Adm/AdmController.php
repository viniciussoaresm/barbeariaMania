<?php
namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;

use App\Models;
use App\Models\UserModel as User;
use App\Models\ClientModel as Client;
use App\Models\CouponModel as Coupon;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class AdmController  extends Controller
{
   
    public function login()
    {       
        return view('site.adm.login');
    }

     /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        


        $users = User::where('login','=',$request->login)->get()->take(1);

        foreach($users as $user){
            $psw = $this->encriptPassword($request->password);

            if($user->password == $psw){
                $request->session()->put('user', $user);
            }
        }

        if($request->session()->get('user')){
            return redirect()->action('Adm\AdmController@dashboard');
            // return view('site.home.index');
        }   
        return redirect()->action('Adm\AdmController@login');

    }

      /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $user = $request->session()->get('user');

        if(!$request->session()->get('user')){
            return redirect()->action('Adm\AdmController@login');
        }

        $clients = Client::all();

        return view('site.adm.register')->with(compact('clients'));    
    }

      /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doregister(Request $request)
    {

        $user = $request->session()->get('user');

        if(!$request->session()->get('user')){
            return redirect()->action('Adm\AdmController@login');
        }

        $coupon = new Coupon;

        $coupon->client_id = $request->client_id;
        $user = User::find($user->id);
        $coupon->barber_id = $user->barber->id;
        $coupon->registration_date = date("Y-m-d");
        $coupon->save();

        
        return redirect()->action('Adm\AdmController@dashboard');
    }


      /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');

        $user = User::find($user->id);



        $coupons = Coupon::where('barber_id','=',$user->barber->id)->orderby('id','DESC')->take(10)->get();
        

        return view('site.adm.dashboard')->with(compact('coupons'));    
        


    }
        

    
  

}
