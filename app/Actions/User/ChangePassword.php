<?php
namespace App\Actions\User;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ChangePassword{
     public function run($request){
        if(auth()->user()->password != ''){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
        }else{
            $request->validate([
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
        }

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return true;
     }
}