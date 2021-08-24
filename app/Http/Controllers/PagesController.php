<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Interest;
use App\Services\Collection\CollectionQueries;
use App\Services\Event\EventQueries;

class PagesController extends Controller
{
    public function index(){
        try{
            $interests = Interest::select('id','name', 'icon')->get();
            $events = (new EventQueries())->withSimplePaginateAndParams(12);
            $collections = (new CollectionQueries())->all();

            // $events = (new EventQueries())->withPagination(12);
            if(Auth::check()){
                return view('welcome')->with('interests', $interests)->with('events', $events)->with('collections', $collections);
            }else{
                return view('welcome')->with('interests', $interests)->with('events', $events)->with('collections', $collections);
            }
        }catch(\Exception $e){
            return redirect()->route('index.view');
        }
        
    }


    public function interests(){
        if (Auth::user()->interests->count() > 0) {
            return redirect()->route('index.view');
        }
        $interests = Interest::select('id','name', 'icon')->get();
        
        return view('user.interests')->with('interests', $interests);

    }
}
