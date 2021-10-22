<?php
namespace App\Actions\Event;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;

class StoreFreeEvent{
    public function run($request, $id){
        $registration = new EventRegistration;
        $registration->event_id = $id;
        $registration->user_id =Auth::id();
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->isPaid = 0;
        $registration->guests = $request->guests;
        $registration->save();
        
        return true;
    }
}