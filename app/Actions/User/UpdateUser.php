<?php
namespace App\Actions\User;

use App\Models\User;
use Auth;
use DB;
class UpdateUser{
     public function run($request){
      DB::BeginTransaction();
        $user = User::find(Auth::id());
        $user->name = $request['name'] ?? $user->name; 
        $user->username = $request['username'] ?? $user->username; 
        $user->email = $request['email'] ?? $user->email; 
        $user->phone_number = $request['phone_number'] ?? $user->email; 
        $user->country = $request['country'] ?? $user->country; 

        $user->update();
      DB::commit();
     }
}