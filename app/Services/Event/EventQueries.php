<?php
namespace App\Services\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Exception;

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
        })
        ->where('user_id', '!=', Auth::id())
        ->where('isPublic', 1)
        ->get();    
    }

    public function withSimplePaginateAndParams($num){
        if(request()->query('category')){
            return Event::whereHas('interests', function (Builder $query){
                $query->where('interests.id', decrypt(request()->query('category')));
            })->simplePaginate($num); 
        }else{
            return Event::simplePaginate($num);
        }
    }

    public function findEventsNearMe(){

        // $ip = $this->getIp();
        // dd($ip);
        // $ip = '105.112.146.245';
        // $data = \Location::get($ip);
        // dd($data);
        // dd(request()->all());
        $latitude = 6.5355;
        $longitude = 3.3087;
        return Event::select(DB::raw("*, ( 6371 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance"))->havingRaw('distance < 50')->orderBy('distance')
        ->when(request()->category !=null, function ($query) {
            $query->whereHas('interests', function (Builder $query){
                return $query->where('interests.id', request()->category);
            });
        })
        ->when(request()->type != null, function ($query) {
            return $query->where('isPaid', request()->type);
        })
        ->where('user_id', '!=', Auth::id())
        ->where('isPublic', 1)
        ->get();
    }

    public function search()
    {
        if(str_word_count(request()->search) < 1 || strlen(request()->search) < 2){
            throw new Exception('Please the search should be at least a word or 2 characters');
        }
        return Event::when(request()->category != null, function ($query) {
            $query->whereHas('interests', function (Builder $query) {
                return $query->where('interests.id', request()->category);
            });
        })
        ->when(request()->type != null, function ($query) {
            return $query->where('isPaid', request()->type);
        })
        ->where('name', 'LIKE', '%' . request()->search . '%' ) 
        -> orWhere('description', 'LIKE', '%' . request()->search . '%')
        -> orWhere('location', 'LIKE', '%' . request()->search . '%')
        ->where('isPublic', 1)
        ->get();
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }

}