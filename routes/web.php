<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesOrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', ProductController::class);
Route::post('product/cari', [ProductController::class, 'cariData']);
Route::resource('customer', CustomerController::class);
Route::post('customer/cari', [CustomerController::class, 'cariData']);
Route::resource('salesorder', SalesOrderController::class);
Route::post('salesorder/cari', [SalesOrderController::class, 'cariData']);
