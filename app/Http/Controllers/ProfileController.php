<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Actions\User\UpdateUser;

class ProfileController extends Controller
{
    public function update(UpdateUserRequest $request){
        try{
            $update = (new UpdateUser())->run($request);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
