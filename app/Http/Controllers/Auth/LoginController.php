<?php
namespace App\Http\Controllers\Auth;

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
            if(Auth::check()){
                return redirect()->route('admin.dashboard');
            }
            $input = $request->all();
            
            $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
    
            $fieldType = filter_var($request->username , FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
            $shouldRemember = $request->remember ? true : false;
    
            if (Auth::attempt(array($fieldType => $input['username'] , 'password' => $input['password'], 'isActive' => 1 ) ,  $shouldRemember ) ) {
                $request->session()->regenerate();
    
                return redirect()->intended('/')->with(
                    'success', 'Welcome!',
                );
            }
            session()->flash('loginMsg', 'The provided credentials do not match our records.');
            return back();
        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/')->with(
            'success', 'Logged Out Successfully',
        );
    }
}