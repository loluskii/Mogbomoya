<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Actions\Event\CreateEvent;

class EventController extends Controller
{
    public function index(){
        $events = Event::where('user_id', Auth::id())->paginate();
        return view('user.my-events');

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
}
