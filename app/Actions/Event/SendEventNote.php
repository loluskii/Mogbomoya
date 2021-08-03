<?php
namespace App\Actions\Event;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Services\Event\EventQueries;

class SendEventNote{
    public function run($request, $slug){
        DB::beginTransaction();
            $event = (new EventQueries())->findRefWithAuth($slug);
            if($event){
                if($event->registrations->count() > 0){
                    $details = $event->registrations;
                    $event = $event;
                    dispatch(new \App\Jobs\SendNoteJob($details, $event, $request->message));
                }
            }
        DB::commit();
    }
}