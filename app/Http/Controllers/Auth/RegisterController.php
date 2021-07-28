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
use Illuminate\Auth\Events\Registered;
use DB;

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
        return redirect()->intended('/')->with(
            'success' , 'Welcome'
        );
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['error' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver) {
        // check for existing account
        $user = User::firstWhere('email', $providerUser->getEmail());
    
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
                      'email_verified_at' => now(),
                      'avatar' => $providerUser->getAvatar(),
                      'provider' => $driver,
                      'provider_id' => $providerUser->getId(),
                      'access_token' => $providerUser->token,
                      'isActive' => 1,
                      'password' => '' // user can use reset password to create a password
                ]);
    
                 }else{
                
                //Show message here 

                return redirect()->route('login.view')->with(
                    'error', 'Something went wrong, Please try again or use another login method'
                );
                
               }
          }
     
          // login the user
            if($user->isActive !== 1){
                return redirect()->route('login.view')->with(
                    'error', 'Sorry this account is inactive/deactivated'
                );
            }
            Auth::login($user, true);
            return $this->sendSuccessResponse();
      }
    

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }

    public function register(StoreUserRequest $request){
        try{
            DB::BeginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password)
          ]);   
    

          Auth::login($user, true);
          event(new Registered($user));
          DB::commit();


        //   $user->sendEmailVerificationNotification();

          return redirect()->intended('/')->with(
            'success' , 'Welcome'
          );

        }catch(\Exception $e){
            return back()->with(
                'error', $e->getMessage()
            );
        } 
    }
}