<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KunjunganController;

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

//LOGOUT
Route::get('/', [LoginController::class, 'index'])->name('relogin');
Route::get('/dologout', [LogoutController::class, 'index'])->name('dologout');

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

//KUNJUNGAN
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');

Route::get('/tambahkunjungan', [KunjunganController::class, 'TambahKunjunganForm'])->name('tambahKunjungan');
Route::post('/insertkunjungan', [KunjunganController::class, 'insertKunjungan'])->name('insertKunjungan');

