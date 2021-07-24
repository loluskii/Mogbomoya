<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Actions\User\ForgotPasswordEmail;
use App\Actions\User\ResetPassword;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendEmail(ForgotPasswordRequest $request){
        try{
            (new ForgotPasswordEmail())->run($request);
            return back()->with(
                'success' , 'We have sent you a password reset link to the email provided.'
              );
    
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );
        } 
    }

    public function updatePassword(ResetPasswordRequest $request){
        try{
            $status = (new ResetPassword())->run($request);

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login.view')->with('success', __($status))
                    : back()->with(['error' => [__($status)]]);
    
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );
        } 
    }
}
