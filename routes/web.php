<?php
namespace App;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/home', function () {
    return view('home.index');
})->middleware('auth');

Route::get('/', function () {
    return view('login_and_register.index');
});

// Route::resource('detail_transaksi', DetailTransaksiController::class);
Route::resource('member', MemberController::class)->middleware('auth');
Route::resource('outlet', OutletController::class)->middleware('auth');
Route::resource('paket', PaketController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
// Route::resource('transaksi', TransaksiController::class);
// Route::resource('user', UserController::class);

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/auth', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/', [LoginController::class, 'storeRegister']);

