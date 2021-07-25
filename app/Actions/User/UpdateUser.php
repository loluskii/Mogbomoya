<?php
namespace App\Actions\User;

use App\Models\User;
use App\Models\Interest;
use App\Models\InterestUser;
use Auth;
use DB;
class UpdateUser{
     public function run($request){
      DB::BeginTransaction();
        $user = User::find(Auth::id());
        $user->name = $request['name'] ?? $user->name; 
        $user->username = $request['username'] ?? $user->username; 
        $user->email = $request['email'] ?? $user->email; 
        $user->phone_number = $request['phone_number'] ?? $user->phone_number; 
        $user->country = $request['country'] ?? $user->country; 
        $user->update();

        $verifyInterestIds = [];
        if(!empty($request['interests'])){
          for($i = 0; $i < count($request['interests']); $i++){
              $findInterest = Interest::find((int)$request['interests'][$i]);
              array_push($verifyInterestIds, $findInterest->id);
          }       
        }

        if(empty($verifyInterestIds)){
          Auth::user()->interests()->detach();
        }else{
          Auth::user()->interests()->sync($verifyInterestIds);
        } 

      DB::commit();
     }
}