<?php

namespace App\Http\Controllers;

use App\Actions\Event\AddToCollection;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\SendNoteRequest;
use App\Http\Requests\SendInviteRequest;
use App\Http\Requests\RegisterForEventRequest;
use App\Actions\Event\CreateEvent;
use App\Actions\Event\StorePaymentRecord;
use App\Actions\Event\VerifyTransaction;
use App\Actions\Event\UpdateEvent;
use App\Actions\Event\SendEventNote;
use App\Actions\Event\SendInvite;
use App\Services\Event\EventQueries;
use Illuminate\Support\Facades\Auth;
use App\Models\Interest;
use App\Services\Collection\CollectionQueries;
use App\Models\Event;
use App\Models\Tier;
use App\Models\EventRegistration;
use DB;
use App\Actions\Event\StoreFreeEvent;
use App\Actions\Event\StorePaidEvent;
use Exception;

class EventController extends Controller
{
    public function index()
    {
        $interests = Interest::all();
        if (Auth::user()->bank) {
            return view('events.new-event.index')->with('interests', $interests);
        } else {
            return redirect()->route('bank.details')->with(
                'error',
                'You need to setup your bank details to create an event'
            );
        }
    }
    public function myEvents()
    {
        $events = (new EventQueries())->withPagination(12);

        return view('user.my-events')->with('events', $events);
    }

    public function create(StoreEventRequest $request)
    {
        try {
            $request->validated();

            (new CreateEvent())->run($request);
            return redirect()->route('user.events')->with(
                'success',
                'Event Created Successfully'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function register(RegisterForEventRequest $request, $id)
    {
        try {
            $event = Event::find($id);
            if ($event->isPaid == 0) {
                $request->validate([
                    'guests' => ['required'],
                ]);
                (new StoreFreeEvent())->run($request, $id);
            } else {
                $res = (new StorePaidEvent())->run($request, $id);
                if ($res['status'] == true && $res['data']['authorization_url']) {
                    return redirect()->away($res['data']['authorization_url']);
                } else {
                    throw new Exception('Something went wrong ');
                }
            }
            return back()->with(
                'success',
                'Event Registration Successful'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function handleCallback(Request $request)
    {
        try {
            $response = (new VerifyTransaction())->run($request->query('trxref'));
            // return $response;
            DB::beginTransaction();

            $fecthTiers  = $response['data']['metadata']['tier'];
            $event_id = 0;
            foreach ($fecthTiers as $tier) {
                // dd($tier['value']  , $tier);
                $numberOfTier = (int)$tier['value'];
                $tier = Tier::find($tier['id']);
                $event_id = $tier->event_id;
                $tier->limit_remaining -= $numberOfTier; 
                $tier->update();

                
            }
            $user_details = $response['data']['metadata']['user_details'];
            $registration = new EventRegistration;
            $registration->event_id = $event_id;
            $registration->name = $user_details['name'];
            $registration->email = $user_details['email'];
            $registration->isPaid = 1;
            $registration->save();

            (new StorePaymentRecord())->run($response['data'], $registration, $event_id);

            DB::commit();

            if ($response['data']['status'] == 'success') {
                return back()->with(
                    'success',
                    'Event Registration Successful'
                );
            } else {
                return back()->with(
                    'error',
                    'Event Registration Failed, ' . $response['data']['gateway_response']
                );
            }
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function show($reference)
    {

        $event = (new EventQueries())->findRef($reference);
        abort_if(!$event, 404);
        // abort_if($event->isPublic == 0, 404);
        $getSimilarEvents = (new EventQueries())->getSimilarEvents($reference);
        $collections = (new CollectionQueries())->withPagination(12);

        if ($event->user_id != Auth::id()) {
            return view('events.info')->with('event', $event)->with('collections', $collections)->with('similarEvents', $getSimilarEvents);
        }

        return view('user.event-info')->with('event', $event)->with('collections', $collections)->with('similarEvents', $getSimilarEvents);
    }

    public function update(Request $request, $slug)
    {
        try {
            (new UpdateEvent())->run($request, $slug);
            return back()->with(
                'success',
                'Event updated Successfully'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function sendNote(SendNoteRequest $request, $slug)
    {
        try {
            (new SendEventNote())->run($request, $slug);
            return back()->with(
                'success',
                'Sent Successfully'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function invite(SendInviteRequest $request, $slug)
    {
        try {
            (new SendInvite())->run($request, $slug);
            return back()->with(
                'success',
                'Invite Sent Successfully'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function addToCollection(Request $request)
    {
        try {
            $response = (new AddToCollection())->run($request);
            if ($response == false) {
                return back()->with(
                    'error',
                    'This event exists in the collection already.'
                );
            }
            return back()->with(
                'success',
                'Event added to collection Successfully'
            );
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function eventsNearMe()
    {
        try {
            $events = (new EventQueries())->findEventsNearMe();
            $interests = Interest::all();
            return view('events.search')->with('events', $events)->with('interests', $interests);
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }

    public function search(SearchRequest $request)
    {
        try {
            $events = (new EventQueries())->search();
            $interests = Interest::all();
            return view('search.index')->with('events', $events)->with('interests', $interests);
        } catch (\Exception $e) {
            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}
