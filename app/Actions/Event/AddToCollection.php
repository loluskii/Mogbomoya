<?php

namespace App\Actions\Event;

use DB;
use App\Models\EventCollection;
use App\Services\Collection\CollectionQueries;
use App\Services\Event\EventQueries;

class AddToCollection
{
    public function run($request)
    {
        DB::beginTransaction();
        $event = (new EventQueries())->findRef($request->event_reference);
        $collection = (new CollectionQueries())->findRef($request->collection_reference);

        $checkIfExists = EventCollection::where('event_id', $event->id)->where('collection_id', $collection->id)->exists();

        if ($checkIfExists) {
            $status = false;
        } else {
            $eventCollection = new EventCollection;
            $eventCollection->event_id = $event->id;
            $eventCollection->collection_id = $collection->id;
            $eventCollection->save();

            $status = true;
        }
        DB::commit();
        return $status;
    }
}
