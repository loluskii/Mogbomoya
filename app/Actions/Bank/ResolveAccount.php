<?php
namespace App\Actions\Bank;

use Illuminate\Support\Facades\Http;

class ResolveAccount{
    public function run($request){
        return Http::withToken(config('paystack.secretKey'))->get('https://api.paystack.co/bank/resolve', [
            'account_number' => $request->account_number,
            'bank_code' => $request->bank_code
        ]);
    }
}