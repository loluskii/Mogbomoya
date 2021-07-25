<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCollectionRequest;
use App\Actions\Collection\CreateCollection;
use App\Models\Collection;
use App\Services\Collection\CollectionQueries;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = (new CollectionQueries())->withPagination(12);

        return view('user.collections')->with('collections', $collections);
    }

    public function create(StoreCollectionRequest $request){
        try{
            $request->validated();
            (new CreateCollection())->run($request);
            return redirect()->route('user.collections')->with(
                'success', 'Collection Created Successfully'
            );
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );   
        }
    }

    public function show($reference){

        $collection = (new CollectionQueries())->findRef($reference);

        $event_collection = $collection->id;

        if($collection->user_id == Auth::id()){
            return view('collections.info')->with('collection', $collection);
        }

        abort(404);

    }
}
