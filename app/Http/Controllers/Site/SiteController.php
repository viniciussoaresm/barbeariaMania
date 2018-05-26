<?php
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Models;
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
    public function index()
    {       
        return view('site.home.index');
    }

    public function login()
    {       
        return view('site.home.login');
    }
}
