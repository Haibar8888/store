<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index () {
        return view('pages.dashboard-product-transaction');
    }

    public function detail () {
        return view('pages.dashboard-product-transaction-detail');
    }
}

