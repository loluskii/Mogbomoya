<?php

namespace App\Actions\User;

use App\Models\User;
use App\Models\Interest;
use Auth;
use DB;

class UpdateUserInterest
{
  public function run($request)
  {
    DB::beginTransaction();
    $verifyInterestIds = [];
    if (!empty($request['interests'])) {
      for ($i = 0; $i < count($request['interests']); $i++) {
        $findInterest = Interest::find((int)$request['interests'][$i]);
        array_push($verifyInterestIds, $findInterest->id);
      }
    }

    if (empty($verifyInterestIds)) {
      Auth::user()->interests()->detach();
    } else {
      Auth::user()->interests()->sync($verifyInterestIds);
    }

    DB::commit();
  }
}
