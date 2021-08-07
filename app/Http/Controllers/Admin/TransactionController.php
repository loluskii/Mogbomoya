<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRecord;


class TransactionController extends Controller
{
    public function index(){
        $transactions = PaymentRecord::paginate(10);
        return view('admin.transactions.index')->with('transactions', $transactions);
    }
}