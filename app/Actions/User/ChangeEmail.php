<?php
namespace App\Actions\User;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use DB;
use App\Notifications\EmailUpdateVerificationNotification;

class ChangeEmail{
     public function run($request){

        if(Auth::user()->password != ''){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
            ]);
        }
        $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email,'.Auth::id(),
        ]);
        DB::BeginTransaction();
        $user = User::find(Auth::id());
        $user->email =  $request->email;
        session(['email' => $request->email]);
        $user->notify(new EmailUpdateVerificationNotification($request->email));
        return true;
        DB::commit();
     }
}