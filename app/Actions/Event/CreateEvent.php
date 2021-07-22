<?php
namespace App\Actions\Event;
use App\Models\Event;
use App\Models\Tier;
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
            $imageName = Str::slug($request['name']).'-'.time().'.'.$request->featured_image->extension();  
            $request->featured_image->move(public_path('images/event'), $imageName);
            $event->featured_image = $imageName;
            $event->save();
            for($i = 0; $i < count($request['tier_name']); $i++){
                $tier = new Tier;
                $tier->name =  $request['tier_name'][$i];
                $tier->price =  $request['tier_price'][$i];
                $tier->limit =  $request['limit'][$i];
                $tier->limit_remaining =  $request['limit'][$i];
                $tier->event_id = $event->id;

                $tier->save();
            }
        DB::commit();
    }
}