<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function authenticate(Request $request)
    {
        try{
            $input = $request->all();
            
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
    
            $fieldType = filter_var($request->username , FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
            $shouldRemember = $request->remember ? true : false;
    
            if (Auth::attempt(array($fieldType => $input['username'] , 'password' => $input['password']) ,  $shouldRemember ) ) {
                $request->session()->regenerate();
    
                return redirect()->intended('/')->with(
                    'success', 'Welcome!',
                );
            }
            return back()->with(
                'error', 'The provided credentials do not match our records.',
            );
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with(
            'success', 'Logged Out Successfully',
        );
    }
}