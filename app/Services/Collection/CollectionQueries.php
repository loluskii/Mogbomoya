<?php
namespace App\Services\Collection;
use Illuminate\Support\Facades\Auth;
use App\Models\Collection;

class CollectionQueries{

    public function countMyCollections(){
        return Collection::where('user_id', Auth::id())->count();
    }

    public function withPagination($num){
        return Collection::where('user_id', Auth::id())->paginate($num ?? 10);
    }

    public function findRefWithAuth($ref){
        return Collection::where('user_id', Auth::id())->where('reference', $ref)->first();
    }

    public function findRef($ref){
        return Collection::where('reference', $ref)->first();
    }

    public function findById($id){
        return Collection::find($id);
    }

}