<?php
namespace App\Actions\Event;
use App\Models\Event;
use App\Actions\Event\StoreFreeEvent;
use App\Actions\Event\StorePaidEvent;

class RegisterForEvent{
    public function run($request, $id){
        $event = Event::find($id);

        if($event->isPaid == 0){
            $request->validate([
                'guests' => ['required'],
            ]);
            (new StoreFreeEvent())->run($request, $id);
        }else{
            
            (new StorePaidEvent())->run($request, $id);
        }
        
    }
}