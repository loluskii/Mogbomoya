<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
class PagesController extends Controller
{
    public function index(){
        if(Auth::check()){
            $words = array(Auth::user()->name);
                
            $initials = implode('/', array_map(function ($name) { 
                preg_match_all('/\b\w/', $name, $matches);
                return implode('', $matches[0]);
            }, $words));

            return view('welcome');
        }else{
            return view('welcome');
        }
        
    }
}
