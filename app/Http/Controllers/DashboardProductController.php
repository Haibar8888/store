<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    //
    public function index() {
        return view('pages.dashboard-product');
    }

    public function detail() {
        return view('pages.dashboard-product-detail');
    }
 
    public function create () {
        return view('pages.dashboard-product-create');
    }
}
