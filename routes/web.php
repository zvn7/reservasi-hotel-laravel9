<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;

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

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware('auth');
Route::get('reservasi', [ReservasiController::class,'index'])->name('reservasi.index')->middleware('auth');
Route::get('reservasi/create', [ReservasiController::class, 'create' ])->name('reservasi.create')->middleware('auth');
Route::post('reservasi/store', [ReservasiController::class, 'store' ])->name('reservasi.store')->middleware('auth');
Route::post('reservasi', [ReservasiController::class, 'store' ])->name('reservasi.store')->middleware('auth');
Route::get('reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit')->middleware('auth');
Route::put('reservasi/update/{id}', [ReservasiController::class, 'update'])->name('reservasi.update-payment-status')->middleware('auth');
Route::put('reservasi/{id}', [ReservasiController::class, 'update' ])->name('reservasi.update')->middleware('auth');
Route::delete('reservasi/{id}', [ReservasiController::class, 'destroy' ])->name('reservasi.destroy')->middleware('auth');
Route::get('reservasi/show/{id}', [ReservasiController::class, 'show' ])->name('reservasi.show')->middleware('auth');
Route::get('reservasi/invoice/{id}', [ReservasiController::class, 'invoice' ])->name('reservasi.invoice')->middleware('auth');

Auth::routes();

// Route::get('', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
