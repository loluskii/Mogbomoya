<?php
namespace App\Actions\Event;

use Illuminate\Support\Facades\Http;

class VerifyTransaction{
    public function run($reference){
        $res = Http::withToken(config('paystack.secretKey'))->get('https://api.paystack.co/transaction/verify/'.$reference);
        return $res;
    }
}