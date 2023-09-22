<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model
use App\Models\Province;
use App\Models\Regency;

class LocationController extends Controller
{
    //
    public function provinces() 
    {
        return Province::all();
    }

    public function regencies(Request $request,$provincies_id) 
    {
        return Regency::where('province_id',$provincies_id)->get();
    }
}
