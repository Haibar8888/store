<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transactions;

class DashboardController extends Controller
{
    //
    public function index () {
        $costumer = User::count();
        $revenue = Transactions::where('transaction_status','SUCCESS')->sum('total_price');
        $transaction = Transactions::count();
        return view('pages.admin.dashboard',compact('costumer','revenue','transaction'));
    }
}
