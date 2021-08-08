<?php

namespace App\Actions\Interest;

use App\Models\Interest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateInterest
{
    public function run($id,$request)
    {
        DB::beginTransaction();
        $interest = Interest::find($id);
        if($request->icon){
            $image_path_to_remove = public_path() . '/images/icons/' . $interest->icon;
            unlink($image_path_to_remove);
            $imageName = Str::slug($request['name']) . '-' . time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('images/icons'), $imageName);
            $interest->icon = $imageName;
        }    
        $interest->name = $request['name'] ?? $interest->name;
        $interest->update();
        DB::commit();
    }
}
