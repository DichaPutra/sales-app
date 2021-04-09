<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\CapaianController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TargetAdminController;
use App\Http\Controllers\KunjunganAdminController;
use App\Http\Controllers\UserAdminController;
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
Route::get('/targetAdmin', [TargetAdminController::class, 'index'])->name('targetAdmin');


//CUSTOMER
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/tambahcustomer', [CustomerController::class, 'tambahCustomer'])->name('tambahcustomer');
Route::post('/insertcustomer', [CustomerController::class, 'insertCustomer'])->name('insertcustomer');
Route::get('/detailcustomer/{id}', [CustomerController::class, 'detailCustomer'])->name('detailcustomer');
Route::get('/deletecustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('deletecustomer');
Route::get('/editcustomer/{id}', [CustomerController::class, 'editCustomerForm'])->name('editcustomer');
Route::post('/updatecustomer', [CustomerController::class, 'updateCustomer'])->name('updatecustomer');

//CAPAIAN
Route::get('/capaian', [CapaianController::class, 'index'])->name('capaian');
Route::get('/capaianSelected', [CapaianController::class, 'capaianSelected'])->name('capaianSelected');
Route::get('/disetujui/{id}', [CapaianController::class, 'disetujui'])->name('disetujui');
Route::get('/tidakDisetujui/{id}', [CapaianController::class, 'tidakDisetujui'])->name('tidakDisetujui');


// USER/GANTI PASSWORD
Route::get('/gantipassword', [GantiPasswordController::class, 'index'])->name('gantipassword');
Route::post('/gantipassword/', [GantiPasswordController::class, 'gantiPassword'])->name('update.gantipassword');
// Route::get('/user', function () {
//     return view('user');
// });


//LAPORAN
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
//Route::get('/laporan', function () {
//    return view('laporan');
//});

//KUNJUNGAN
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
Route::get('/tambahkunjungan', [KunjunganController::class, 'TambahKunjunganForm'])->name('tambahKunjungan');
Route::post('/insertkunjungan', [KunjunganController::class, 'insertKunjungan'])->name('insertKunjungan');

// KUNJUNGAN ADMIN
Route::get('/kunjunganAdmin', [KunjunganAdminController::class, 'index'])->name('kunjunganAdmin');
Route::get('/updateStatusKunjungan', [KunjunganAdminController::class, 'updateStatusKunjungan'])->name('updateStatusKunjungan');
Route::get('/deleteKunjungan/{id}',[KunjunganAdminController::class, 'deleteKunjungan'])->name('deleteKunjungan');

// USER ADMIN
Route::get('/useradmin', [UserAdminController::class, 'index'])->name('useradmin');
Route::post('/adduser', [UserAdminController::class, 'addUser'])->name('adduser');
Route::post('/edituser', [UserAdminController::class, 'editUser'])->name('edituser');
Route::get('/deleteuser/{id}', [UserAdminController::class, 'deleteUser'])->name('deleteuser');

//Route::get('/userAdmin', function () {
//    return view('userAdmin');
//});

Route::get('/coba', function () {
    return view('coba');
});