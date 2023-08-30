<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Admin\DashboardController AS AdminController;
use App\Http\Controllers\Admin\CategoryController AS CategoryAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;

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
Route::get('/categories',[DashboardCategoryController::class,'index'])->name('category.index');
Route::get('/categories/detail/{id}',[DashboardCategoryController::class,'detail'])->name('category.detail');
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
Route::prefix('admin')->group(function (){
        Route::get('/',[AdminController::class,'index'])->name('admin.dashboard');
        Route::resource('/category',CategoryAdminController::class);
        Route::resource('/user',UserController::class);
        Route::resource('/product',ProductController::class);
        Route::resource('/product-gallery',ProductGalleryController::class);
});
