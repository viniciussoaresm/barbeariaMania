<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected function encriptPassword($argPassword)
    {
        $argPassword =  str_replace('a','*',$argPassword);
        $argPassword = str_replace('e','+',$argPassword);
        return base64_encode($argPassword);
    }
    
    protected function decriptPassword($argPassword)
    {
        $argPassword =  str_replace('*','a',$argPassword);
        $argPassword = str_replace('+','e',$argPassword);
        return base64_decode($argPassword);
    }

}
