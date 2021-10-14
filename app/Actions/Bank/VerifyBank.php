<?php
namespace App\Actions\Bank;

use App\Actions\Bank\AllBanks;
use App\Actions\Bank\ResolveAccount;
use Exception;
use Auth;
use Illuminate\Support\Str;

class VerifyBank{

    public function run($request){
        $banks = (new AllBanks())->run();
        $bankDetails = [];
        for($i = 0; $i < count($banks['data']); $i++){
            if($banks['data'][$i]['id'] == $request->bank_name){
            array_push($bankDetails, $banks['data'][$i]);
            }
        }
        if(empty($bankDetails)){
            throw new Exception('Something went wrong.');
        }
        $request->merge(['bank_id'=> $bankDetails[0]['id'], 'bank_code'=> $bankDetails[0]['code'], 'bank_name'=>$bankDetails[0]['name']]);
        $resolve = (new ResolveAccount())->run($request);
        if($resolve['status'] != true){
            
            throw new Exception($resolve['message']);
        }
        $splitName = explode(' ', strtolower($resolve['data']['account_name']));
        $contains = Str::contains(strtolower(Auth::user()->name), $splitName);
        if(!$contains){
            throw new Exception('You can not add an account that does not match your profile name.');
        }
        $request->merge(['account_name'=> $resolve['data']['account_name']]);
        (new CreateOrUpdateBank())->run($request);
        return true;
    }
}