<?php
namespace App\Services\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventQueries{

    public function countMyEvents(){
        return Event::where('user_id', Auth::id())->count();
    }

    public function withPagination($num){
        return Event::where('user_id', Auth::id())->paginate($num ?? 10);
    }

    public function findRefWithAuth($ref){
        return Event::firstWhere('user_id', Auth::id())->where('reference', $ref);
    }

    public function findRef($ref){
        return Event::firstWhere('reference', $ref);
    }

    public function findById($id){
        return Event::find($id);
    }

}