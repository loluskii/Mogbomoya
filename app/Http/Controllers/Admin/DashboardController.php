<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\PaymentRecord;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        $users = User::latest()->take(10)->get();
        $totalEvents = Event::count();
        $totalTransactions = PaymentRecord::count();
        return view('admin.index')->with('totalUsers', $totalUsers)->with('totalEvents', $totalEvents)->with('totalTransactions', $totalTransactions)->with('users', $users);
    }
}