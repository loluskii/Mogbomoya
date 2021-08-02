<?php
namespace App\Actions\Event;
use App\Models\Event;
use App\Models\Tier;
use App\Models\Interest;
use App\Models\InterestEvent;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Actions\Event\CreateEventSubAccount;
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
            $event->longitude = $request['longitude'];
            $event->latitude = $request['latitude'];
            $event->isPublic = $request['isPublic'];
            $event->isPaid = $request['isPaid'];
            $imageName = Str::slug($request['name']).'-'.time().'.'.$request->featured_image->extension();  
            $request->featured_image->move(public_path('images/event'), $imageName);
            $event->featured_image = $imageName;
            $event->save();
            
            if($event->isPaid == 1){
                for($i = 0; $i < count($request['tier_name']); $i++){
                    $tier = new Tier;
                    $tier->name =  $request['tier_name'][$i];
                    $tier->price =  $request['tier_price'][$i];
                    $tier->limit =  $request['limit'][$i];
                    $tier->limit_remaining =  $request['limit'][$i];
                    $tier->event_id = $event->id;
                    $tier->reference = Str::random(12);
                    $tier->save();
                }
            }
            
            for($i = 0; $i < count($request['categories']); $i++){
                $findInterest = Interest::find((int)$request['categories'][$i]);
                if($findInterest){
                    $category = new InterestEvent;
                    $category->interest_id =  $request['categories'][$i];
                    $category->event_id = $event->id;
                    $category->save();
                }
            }
            $eventDetails = [
                'name' => $event->name,
                'id' => $event->id
            ];
            
            if($event->isPaid == 1){
                (new CreateEventSubAccount())->run($eventDetails);
            }
            
        DB::commit();
    }
}