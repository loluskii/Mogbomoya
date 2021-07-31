<?php
namespace App\Services\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;

class EventQueries{

    public function countMyEvents(){
        return Event::where('user_id', Auth::id())->count();
    }

    public function withPagination($num){
        return Event::where('user_id', Auth::id())->paginate($num ?? 10);
    }

    public function findRefWithAuth($ref){
        return Event::where('user_id', Auth::id())->where('reference', $ref)->first();
    }

    public function findRef($ref){
        return Event::firstWhere('reference', $ref);
    }

    public function findById($id){
        return Event::find($id);
    }

    public function getSimilarEvents($ref){
        $getInterestIds =  Event::where('reference', $ref)->first()->interests->pluck('id');
        return Event::whereHas('interests', function (Builder $query) use($getInterestIds) {
            $query->whereIn('interests.id', $getInterestIds);
        })->get();    
    }

    public function withSimplePaginateAndParams($num){
        if(request()->query('search')){
            return Event::whereHas('interests', function (Builder $query){
                $query->where('interests.id', decrypt(request()->query('search')));
            })->simplePaginate($num); 
        }else{
            return Event::simplePaginate($num);
        }
    }

}