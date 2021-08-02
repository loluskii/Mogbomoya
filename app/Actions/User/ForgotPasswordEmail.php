<?php
namespace App\Actions\User;
use Illuminate\Support\Facades\Password;

class ForgotPasswordEmail{
    public function run($request){
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return true;
        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['status' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);
    }
}