<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\Pelanggan;

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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //Golongan
    Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.index');
    Route::post('/golongan', [GolonganController::class, 'store'])->name('golongan.store');
    Route::patch('/golongan/{id}', [GolonganController::class, 'update'])->name('golongan.update');
    Route::delete('/golongan/{id}', [GolonganController::class, 'destroy'])->name('golongan.destroy');

    //Pelanggan
    Route::get('/pelanggan', [Pelanggan::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan', [Pelanggan::class, 'store'])->name('pelanggan.store');
    Route::patch('/pelanggan/{id}', [Pelanggan::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id}', [Pelanggan::class, 'destroy'])->name('pelanggan.destroy');
});


require __DIR__ . '/auth.php';
