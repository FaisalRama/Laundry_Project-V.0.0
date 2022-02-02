<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
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

// Route::resource('detail_transaksi', DetailTransaksiController::class);
Route::resource('member', MemberController::class);
Route::resource('outlet', OutletController::class);
Route::resource('paket', PaketController::class);
// Route::resource('transaksi', TransaksiController::class);
// Route::resource('user', UserController::class);

Route::get('/', function () {
    return view('home/index');
});
