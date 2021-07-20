<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $providers = [
        'facebook','google'
    ];

    public function show()
    {
        return view('auth.login');
    }

    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

  
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('/');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver) {
        // check for existing account
        $user = User::where('email', $providerUser->getEmail())->first();
    
    // if user already found
            if( $user ) {
                // update the avatar and provider that might have changed
                $user->update([
                    'avatar' => $providerUser->avatar,
                    'provider' => $driver,
                    'provider_id' => $providerUser->id,
                    'access_token' => $providerUser->token
                ]);
            } else {
                  if($providerUser->getEmail()){ //Check email exists or not. If exists create a new user
                   $user = User::create([
                      'name' => $providerUser->getName(),
                      'email' => $providerUser->getEmail(),
                      'avatar' => $providerUser->getAvatar(),
                      'provider' => $driver,
                      'provider_id' => $providerUser->getId(),
                      'access_token' => $providerUser->token,
                      'password' => '' // user can use reset password to create a password
                ]);
    
                 }else{
                
                //Show message here 
                
               }
          }
    
          // login the user
            Auth::login($user, true);
            return $this->sendSuccessResponse();
      }
    

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }

    public function register(StoreUserRequest $request){
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password)
          ]);   
    
          Auth::login($user, true);

          return redirect()->intended('/');

        }catch(\Exception $e){
            return $e->getMessage();
        } 
    }
}