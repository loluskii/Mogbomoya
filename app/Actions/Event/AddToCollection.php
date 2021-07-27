<?php
namespace App\Actions\Event;
use DB;
use App\Models\EventCollection;
use App\Services\Collection\CollectionQueries;
use App\Services\Event\EventQueries;

class AddToCollection{
    public function run($request)
    {
        DB::BeginTransaction();
            $event = (new EventQueries())->findRef($request->event_reference);
            $collection = (new CollectionQueries())->findRef($request->collection_reference);

            $eventCollection = new EventCollection;
            $eventCollection->event_id = $event->id;
            $eventCollection->collection_id = $collection->id;
            $eventCollection->save();
        DB::commit();   
    }
}