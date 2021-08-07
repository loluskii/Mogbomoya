<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;
use App\Models\Event;


class EventController extends Controller
{
    public function index(){
        $events = Event::paginate(10);
        return view('admin.events.index')->with('events', $events);
    }

    public function registrations($id)
    {
        $registrations = EventRegistration::where('event_id', $id)->paginate(10);
        $event = Event::find($id);
        return view('admin.events.registrations')->with('registrations', $registrations)->with('event', $event);
    }
}