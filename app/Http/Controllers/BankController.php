<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Bank\AllBanks;
use App\Actions\Bank\VerifyBank;
use App\Http\Requests\StoreBankRequest;
use Auth;
use App\Models\User;
class BankController extends Controller
{
    public function index(){
        $myBank = User::find(Auth::id())->bank;
        dd($myBank);
        $banks = (new AllBanks())->run();
        return view('user.bank-details')->with('banks', $banks)->with('myBank', $myBank);
    }

    public function validateBank(StoreBankRequest $request){
        try{
            (new VerifyBank())->run($request);
            return back()->with(
                'success' , 'Bank Account Validated'
            );
        }catch(\Exception $e){
            return back()->with(
                'error' , $e->getMessage()
            );
        }
    }
}
