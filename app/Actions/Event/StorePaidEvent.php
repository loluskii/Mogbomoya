<?php
namespace App\Actions\Event;
use Auth;
use Exception;
use App\Models\Tier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class StorePaidEvent{
    public function run($request, $id){
        $user_details = [
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => Auth::id(),
            'phone_number' => Auth::user()->phone_number,
        ];
        $data = $request->except(['name', 'email', '_token']); // event_reference => no. of tickets
        $details = [];
        $totalAmount = [];
        $getSubAccount = '';
        foreach ($data as $key => $value) {
            $findTier = Tier::firstWhere('reference', $key); //finds the tiers with the event reference => a
            $getSubAccount = $findTier->event->subaccount->subaccount_code; //finds subaccount code => b
            if($findTier && $value != null){ //if a & b are not null
                if($findTier->limit_remaining != null && ($value > $findTier->limit_remaining)){ //if the number of tickets being bought are more than the amounts left
                    throw new Exception('Oops! It seems like you have selected more than the slot(s) left');
                }
                array_push($details, ['id' => $findTier->id, 'value' => $value]); //push into $details[], tiers_id and no of tickets as key and value
                array_push($totalAmount, ($value * $findTier->price)); //push into $totalAmount[], 
            }
        }
        //dd($details,$totalAmount);
        if(empty($details) || empty($totalAmount)){
            throw new Exception('Something went wrong');
        }
        $sumTotal = array_sum($totalAmount);
        $metadata = [
            'tier' => $details,
            'user_details' => $user_details
        ];
        // dd($metadata);

        $res = Http::withToken(config('paystack.secretKey'))->post('https://api.paystack.co/transaction/initialize', [
            'email' => $request->email,
            'amount' => $sumTotal * 100,
            'reference' => Str::random(17),
            'quantity' => 1,
            'subaccount' => $getSubAccount,
            'bearer' => 'subaccount',
            'metadata' => json_encode($metadata),
            'callback_url' => 'http://mogbomoya.herokuapp.com/event/payment-callback'
        ]);
        
        return $res->collect();
        

    }
}