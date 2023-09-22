<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// controller 
use App\Http\Controllers\API\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinces',[LocationController::class,'provinces'])->name('api-provinces');
Route::get('regencies/{provincies_id}',[LocationController::class,'regencies'])->name('api-regencies');
