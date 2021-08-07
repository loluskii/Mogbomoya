<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserInterestRequest;
use App\Models\Interest;
use App\Actions\User\UpdateUser;
use App\Actions\User\UpdateUserInterest;
use App\Actions\User\ChangePassword;
use App\Actions\User\ChangeEmail;
use App\Actions\User\ChangeActiveStatus;
use App\Actions\Country\AllCountries;
use Auth;

class UserController extends Controller
{
    public function edit(){
        try{
            $myInterests = Auth::user()->interests->pluck('id')->toArray();
            $countries = (new AllCountries())->run();
            $interests = Interest::select('id','name', 'icon')->get();

            return view('user.index')->with('countries', $countries)->with('interests', $interests)->with('myInterests', $myInterests);
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function update(UpdateUserRequest $request){
        try{
            (new UpdateUser())->run($request->validated());
            return back()->with(
                'success' , 'Profile Updated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function updateInterest(UpdateUserInterestRequest $request){
        try{
            (new UpdateUserInterest())->run($request->validated());
            return redirect()->route('index.view')->with(
                'success' , 'Interest Updated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function changePassword(Request $request){
        try{
            (new ChangePassword())->run($request);
            return back()->with(
                'success' , 'Password Updated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function changeEmail(Request $request){
        try{
            (new ChangeEmail())->run($request);
            return back()->with(
                'success' , 'Please click the link sent to your new email to verify and update your new email'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }

    public function changeActiveStatus(Request $request){
        try{
            (new ChangeActiveStatus())->run($request);
            return redirect()->route('login.view')->with(
                'success' , 'User Deactivated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }
}
