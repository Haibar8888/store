<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    //
    public function store () {
        return view('pages.dashboard-setting');
    }

    public function index () {
        return view('pages.dashboard-account');
    }
}
