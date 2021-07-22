<?php
namespace App\Actions\User;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ChangeActiveStatus{
     public function run($request){

        if(auth()->user()->password != ''){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
            ]);
        }

        $user = User::find(auth()->user()->id);
        $user->isActive = !$user->isActive;
        $user->update();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return true;
     }
}