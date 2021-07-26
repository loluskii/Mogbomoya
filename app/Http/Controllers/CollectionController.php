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

        $collection_name = $collection->name;

        $event_collections = $collection->event_collections()->paginate(10);

        return view('user.collections-info')->with('event_collections', $event_collections)->with('collection_name', $collection_name);

    }
}
