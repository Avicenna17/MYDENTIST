<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RekamMedisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('/', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
// bersama
Route::get('/home', [HomeController::class,'index'])->name('dashboard');
// Route::get('/home', [HomeController::class,'index'])->name('dashboard');
Route::get('/terbayar-bulanan', [HomeController::class,'getPaidMonthly'])->name('paid-monthly');
Route::resource('/jadwal', JadwalController::class);
// dokter
Route::group(['middleware' => 'dokter'], function () {

Route::get('/rekam-medis', [RekamMedisController::class,'index'])->name('rekam-medis');
Route::get('/rekam-medis/create/', [RekamMedisController::class,'create'])->name('tambah-rekam-medis');
Route::post('/rekam-medis/create/', [RekamMedisController::class,'store'])->name('simpan-rekam-medis');
});
// admin
Route::group(['middleware' => 'admin'], function () {
Route::resource('/user', UserController::class);
Route::get('/pembayaran',[PembayaranController::class,'index'])->name('bayar.index');
Route::get('/pembayaran/{id}',[PembayaranController::class,'create'])->name('bayar.add');
Route::post('/pembayaran/{id}',[PembayaranController::class,'store'])->name('bayar.add');
Route::get('/pembayaran/{id}/show',[PembayaranController::class,'show'])->name('bayar.show');
});
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
