<?php

namespace App\Actions\User;

use App\Models\User;
use Auth;
use DB;

class AdminUpdateUser
{
  public function run($request)
  {
    DB::beginTransaction();
    $user = User::find(Auth::id());
    $user->name = $request['name'] ?? $user->name;
    $user->username = $request['username'] ?? $user->username;
    $user->email = $request['email'] ?? $user->email;
    $user->phone_number = $request['phone_number'] ?? $user->phone_number;
    $user->isActive = $request['isActive'] ?? $user->isActive;
    $user->isAdmin = $request['isAdmin'] ?? $user->isAdmin;
    // $user->country = $request['country'] ?? $user->country; 
    $user->update();
    DB::commit();
  }
}
