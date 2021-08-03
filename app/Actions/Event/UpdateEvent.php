<?php
namespace App\Actions\Event;

use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Services\Event\EventQueries;

class UpdateEvent{
    public function run($request, $slug){
        DB::beginTransaction();
            $event = (new EventQueries())->findRefWithAuth($slug);
            if($event){
                $event->name = $request['name'] ?? $event->name;

                $event->description = $request['description'] ?? $event->description;
 
                if($request->time || $request->date || $request->location){
                    $event->time = $request['time'] ?? $event->time;
                    $event->date = $request['date'] ?? $event->date;
                    $event->location = $request['location'] ?? $event->location;

                    //send change of details mail to registrants

                    if($event->registrations->count() > 0){
                        $details = $event->registrations;
                        dispatch(new \App\Jobs\SendEventChangeJob($details, $event));
                    }
                }

                // $event->event_type = $request['event_type'];
                $event->isPublic = $request['isPublic'] ?? $event->isPublic;

                // $event->isPaid = $request['isPaid'];
                // $event->interest_category_id = $request['categories'];
                // $event->tiers = array($request['tier_name'], $request['tier_price'], $request['limit']);
                // $event->tiers_left = array($request['tier_name'], $request['tier_price'], $request['limit']);

                // $imageName = Str::slug($request['name']).'-'.time().'.'.$request->featured_image->extension();  
        
                // $request->featured_image->move(public_path('images/event'), $imageName);

                // $event->featured_image = $imageName;
    
                $event->update();
            }

        DB::commit();
    }
}