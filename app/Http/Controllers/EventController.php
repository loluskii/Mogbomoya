<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Actions\Event\CreateEvent;
use App\Actions\Event\UpdateEvent;
use App\Services\Event\EventQueries;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use App\Services\Collection\CollectionQueries;

class EventController extends Controller
{
    public function index()
    {
        $interests = Interest::all();
        return view('events.new-event.index')->with('interests', $interests);
    }
    public function myEvents(){
        $events = (new EventQueries())->withPagination(12);
        
        return view('user.my-events')->with('events', $events);
    }

    public function create(StoreEventRequest $request){
        try{
            $request->validated();
            (new CreateEvent())->run($request);
            return redirect()->route('user.events')->with(
                'success', 'Event Created Successfully'
            );
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );   
        }
    }

    public function show($reference){

        $event = (new EventQueries())->findRef($reference);

        $collections = (new CollectionQueries())->withPagination(12);

        if($event->user_id == Auth::id()){
            return view('events.info')->with('event', $event)->with('collections', $collections);
        }

        return view('user.event-info')->with('event', $event);

    }

    public function update(Request $request, $slug){
        try{
            (new UpdateEvent())->run($request, $slug);
            return back()->with(
                'success', 'Event updated Successfully'
            );
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );   
        }
    }
}
