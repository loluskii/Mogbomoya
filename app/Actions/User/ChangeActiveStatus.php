<?php
namespace App\Actions\User;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use DB;

class ChangeActiveStatus{
     public function run($request){

        if(Auth::user()->password != ''){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
            ]);
        }
        DB::BeginTransaction();
        $user = User::find(Auth::id());
        $user->isActive = !$user->isActive;
        $user->update();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return true;
        DB::commit();
     }
}