<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Admin\DashboardController AS AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/cart',[CartController::class,'index'])->name('cart');
Route::get('/success',[CartController::class,'success'])->name('success');
Route::get('/detail/{id}',[DetailController::class,'index'])->name('detail');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// product dashboard
Route::get('/dashboard/products',[DashboardProductController::class,'index'])->name('products');
Route::get('/dashboard/products/detail/{id}',[DashboardProductController::class,'detail'])->name('products.detail');
Route::get('/dashboard/products/create',[DashboardProductController::class,'create'])->name('products.create');

// transactions dashboard
Route::get('/dashboard/transaction',[TransactionController::class,'index'])->name('transactions');
Route::get('/dashboard/transaction/detail/{id}',[TransactionController::class,'detail'])->name('transactions.detail');

// setting dashboard
Route::get('/dashboard/setting',[DashboardSettingController::class,'store'])->name('dashboard.setting.store');
Route::get('/dashboard/account',[DashboardSettingController::class,'index'])->name('dashboard.setting.account');

// admin dashboard
Route::prefix('admin')->namespace('Admin')->group(function (){
        Route::get('/',[AdminController::class,'index'])->name('admin.dashboard');
});