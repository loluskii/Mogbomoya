<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use App\Models\Interest;
use App\Services\Event\EventQueries;

class PagesController extends Controller
{
    public function index(){
        try{
            $interests = Interest::select('id','name', 'icon')->get();
            $events = (new EventQueries())->withSimplePaginateAndParams(12);
            // $events = (new EventQueries())->withPagination(12);
            if(Auth::check()){
                return view('welcome')->with('interests', $interests)->with('events', $events);
            }else{
                return view('welcome')->with('interests', $interests);
            }
        }catch(\Exception $e){
            return redirect()->route('index.view');
        }
        
    }


    public function interests(){
        $interests = Interest::select('id','name', 'icon')->get();
        
        return view('user.interests')->with('interests', $interests);

    }
}
