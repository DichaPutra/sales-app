<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

//LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/dologin', [LoginController::class, 'dologin'])->name('dologin');
Route::get('/loginform', function () {return view('login2');});

//TARGET
Route::get('/target', [TargetController::class, 'index'])->name('target');
Route::post('/updatetarget', [TargetController::class, 'updateTarget'])->name('updatetarget');

//CUSTOMER
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/tambahcustomer', [CustomerController::class, 'tambahCustomer'])->name('tambahcustomer');
Route::post('/insertcustomer', [CustomerController::class, 'insertCustomer'])->name('insertcustomer');
Route::get('/detailcustomer/{id}', [CustomerController::class, 'detailCustomer'])->name('detailcustomer');

Route::get('/capaian', function () {
    return view('capaian');
});

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/kunjungan', function () {
    return view('kunjungan');
});

Route::get('/tambahkunjungan', function () {
    return view('tambahkunjungan');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
