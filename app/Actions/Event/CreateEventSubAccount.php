<?php
namespace App\Actions\Event;
use Illuminate\Support\Facades\Http;
use Auth;
use App\Models\SubAccount;
use Exception;

class CreateEventSubAccount{
    public function run($details){
        $response = Http::withToken(config('paystack.secretKey'))->post('https://api.paystack.co/subaccount', [
            'business_name' => "Mogbomoya ".$details['name'],
            'settlement_bank' => Auth::user()->bank->bank_code, 
            'account_number' => Auth::user()->bank->acct_no, 
            'percentage_charge' => 0.9
        ]);

        if($response['status'] == true){
            $sub_account = new SubAccount;
            $sub_account->event_id = $details['id'];
            $sub_account->name = $response['data']['business_name'];
            $sub_account->settlement_bank = $response['data']['settlement_bank'];
            $sub_account->account_number = $response['data']['account_number'];
            $sub_account->percentage_charge = $response['data']['percentage_charge'];
            $sub_account->subaccount_code = $response['data']['subaccount_code'];

            $sub_account->save();
        }else{
            throw new Exception('Something went wrong');
        }

    }
}