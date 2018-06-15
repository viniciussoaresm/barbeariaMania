<?php
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Models;
use App\Models\ClientModel as Client;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $user = $request->session()->get('user');

        if($user){
            return redirect()->action('Client\ClientController@panel');
        }

        return view('site.home.index')->with(compact('user'));
    }

    public function login()
    {       
        return view('site.home.login');
    }

     /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = false;
        if($request->session()->get('user'))
        {
            $request->session()->forget('user');
        }
        return view('site.home.index')->with(compact('user'));
    }

    public function newUser(Client $client)
    {
        return view('site.home.newUser')->with(compact('form'));        
    }

    /**
     * Search Events
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {

        $user = false;

        $consumers = Client::where('email','=',$request->email)->get()->take(1);

        
        foreach($consumers as $consumer){
            $psw = $this->encriptPassword($request->password);

            if($consumer->password == $psw){
                $user = $consumer;
                $request->session()->put('user', $user);
            }
        }

        if($user){
            return response()
            ->json(['result' => true, 'redirect' => 'client/panel']);
        }  
        return response()
            ->json(['result' => false, 'message' => '<div class="alert alert-danger"> <strong>Falha!</strong> Email ou senha invalido!</div>']);
     }

     public function docontact(Request $request)
    {     

        return view('site.home.index');

     }


     

     public function contact(Request $request)
     {
        return view('site.home.contact')->with(compact('form'));        
     }

}
