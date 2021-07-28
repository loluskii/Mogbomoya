<?php
namespace App\Actions\Bank;

use DB;
use App\Models\Bank;
use Auth;
class CreateOrUpdateBank{
    public function run($request){
        DB::BeginTransaction();
        $checkIfUserHasBank = Bank::firstWhere('user_id', Auth::id());
        if($checkIfUserHasBank == null){
            $bank = new Bank;
            $bank->acct_no = $request->account_number;
            $bank->acct_name = $request->account_name;
            $bank->bank_name = $request->bank_name;
            $bank->bank_code = $request->bank_code;
            $bank->bank_id = $request->bank_id;
            $bank->user_id = Auth::id();
            $bank->save();
        }else{
            $checkIfUserHasBank->acct_no = $request->account_number;
            $checkIfUserHasBank->acct_name = $request->account_name;
            $checkIfUserHasBank->bank_name = $request->bank_name;
            $checkIfUserHasBank->bank_code = $request->bank_code;
            $checkIfUserHasBank->bank_id = $request->bank_id;
            $checkIfUserHasBank->user_id = Auth::id();
            $checkIfUserHasBank->update();
        }
        DB::commit();

        return true;
    }
}