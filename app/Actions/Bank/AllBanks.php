<?php
namespace App\Actions\Bank;

use Illuminate\Support\Facades\Http;

class AllBanks{
    public function run(){
        return Http::withToken(config('paystack.secretKey'))->get('https://api.paystack.co/bank');
    }
}