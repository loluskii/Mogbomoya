<?php

namespace App\Actions\Event;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Event\EventQueries;
use App\Models\User;
use Exception;

class SendInvite
{
    public function run($request, $slug)
    {
        DB::beginTransaction();
        $event = (new EventQueries())->findRef($slug);
        $invitee = User::where('email', $request->invitee)->orWhere('username', $request->invitee)->first();
        if(!$invitee){
            throw new Exception('No user found');
        }
        if($invitee->id == Auth::id()){
            throw new Exception('Sorry, you can not invite yourself for an event.');
        }
        $invite = Auth::user();
        if ($event) {
            dispatch(new \App\Jobs\SendInviteJob($invite, $invitee, $event));
        }
        DB::commit();
    }
}
