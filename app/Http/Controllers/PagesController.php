<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use App\Models\Interest;

class PagesController extends Controller
{
    public function index(){
        $interests = Interest::select('name', 'icon')->get();

        if(Auth::check()){
            // $words = array(Auth::user()->name);
                
            // $initials = implode('/', array_map(function ($name) { 
            //     preg_match_all('/\b\w/', $name, $matches);
            //     return implode('', $matches[0]);
            // }, $words));

            return view('welcome')->with('interests', $interests);
        }else{
            return view('welcome')->with('interests', $interests);
        }
        
    }
}
