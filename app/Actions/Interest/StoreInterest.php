<?php 
namespace App\Actions\Interest;

use App\Models\Interest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreInterest{
    public function run($request){
        DB::beginTransaction();
            $interest = new Interest;
            $imageName = Str::slug($request['name']) . '-' . time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('images/icons'), $imageName);
            $interest->icon = $imageName;
            $interest->name = $request['name'];
            $interest->save();
        DB::commit();
    }
}