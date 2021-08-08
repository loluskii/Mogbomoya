<?php

namespace App\Actions\Collection;

use DB;
use App\Models\Collection;
use Auth;
use Illuminate\Support\Str;

class CreateCollection
{
    public function run($request)
    {
        DB::beginTransaction();
        $collection = new Collection;
        $collection->name = $request['name'];
        $collection->reference = Str::slug($request['name']) . '-' . Str::random(7);
        $collection->user_id = Auth::id();

        $collection->save();
        DB::commit();
    }
}
