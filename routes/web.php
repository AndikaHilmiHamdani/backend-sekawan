<?php

use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('transaction',TransactionController::class);
Route::put('transaction-driver/{id}',[TransactionController::class,'approve_driver'])->name('transaction-driver');
Route::put('transaction-manajer/{id}',[TransactionController::class,'approve_manajer'])->name('transaction-manajer');
