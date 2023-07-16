<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RekamMedisController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [HomeController::class,'index'])->name('dashboard');
Route::get('/terbayar-bulanan', [HomeController::class,'getPaidMonthly'])->name('paid-monthly');
// dokter
Route::get('/rekam-medis', [RekamMedisController::class,'index'])->name('rekam-medis');
Route::get('/rekam-medis/create/{id}', [RekamMedisController::class,'create'])->name('tambah-rekam-medis');
Route::post('/rekam-medis/create/{id}', [RekamMedisController::class,'store'])->name('simpan-rekam-medis');
// admin
Route::resource('/jadwal', JadwalController::class);

});
