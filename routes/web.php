<?php

use App\Http\Controllers\DataKtpController;
use App\Http\Controllers\LoginController;
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


Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/login',[LoginController::class,'aksilogin'])->name('login.aksi');
Route::post('/register',[LoginController::class,'aksiregister'])->name('register.aksi');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/',[DataKtpController::class,'index'])->name('ktp.index');
    Route::get('/create',[DataKtpController::class,'create'])->name('ktp.create');
    Route::get('/{ktp}',[DataKtpController::class,'edit'])->name('ktp.edit');
    Route::post('/',[DataKtpController::class,'store'])->name('ktp.store');
    Route::put('/{ktp}',[DataKtpController::class,'update'])->name('ktp.update');
    Route::delete('/{ktp}',[DataKtpController::class,'delete'])->name('ktp.delete');
});



