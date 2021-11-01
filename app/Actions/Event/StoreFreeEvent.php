<?php
namespace App\Actions\Event;
use App\Models\EventRegistration;
use App\Mail\SendRegistrationMail;
use App\Services\Event\EventQueries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        
        // $event_name;
        $event = (new EventQueries())->findById($id);
        $no_of_ticket = $request->guests;
        // $email = $request->email;
        
        
        $email = new SendRegistrationMail($event,$no_of_ticket);
        Mail::to($request->email)->send($email);
        
        return true;
    }
}