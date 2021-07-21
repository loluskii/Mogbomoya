<?php
namespace App\Actions\Event;
use App\Models\Event;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateEvent{
    public function run($request){
        DB::beginTransaction();
        
            $event = new Event;
            $event->name = $request['name'];
            $event->user_id = Auth::id();
            $event->reference = Str::slug($request['name']).'-'.Str::random(7);
            $event->description = $request['description'];
            $event->time = $request['time'];
            $event->date = $request['date'];
            $event->event_type = $request['event_type'];
            $event->location = $request['location'];
            $event->isPublic = $request['isPublic'];
            $event->isPaid = $request['isPaid'];
            $event->interest_category_id = $request['categories'];
            $event->tiers = array($request['tier_name'], $request['tier_price'], $request['limit']);
            $event->tiers_left = array($request['tier_name'], $request['tier_price'], $request['limit']);

            $imageName = Str::slug($request['name']).'-'.time().'.'.$request->featured_image->extension();  
     
            $request->featured_image->move(public_path('images/event'), $imageName);

            $event->featured_image = $imageName;
  
            $event->save();

        DB::commit();
    }
}