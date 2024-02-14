<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', [UserController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::delete('/delete/{user}', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/rumah-sakit', [RumahSakitController::class, 'index'])->middleware('auth');
Route::get('/rumah-sakit/add', [RumahSakitController::class, 'pageAdd'])->middleware('auth');
Route::post('/rumah-sakit/add', [RumahSakitController::class, 'add'])->middleware('auth');
Route::get('/rumah-sakit/edit/{rs}', [RumahSakitController::class, 'pageEdit'])->middleware('auth');
Route::post('/rumah-sakit/edit/{rs}', [RumahSakitController::class, 'edit'])->middleware('auth');
Route::delete('/rumah-sakit/delete/{rs}', [RumahSakitController::class, 'destroy'])->middleware('auth');

Route::get('/pasien', [PasienController::class, 'index'])->middleware('auth');
Route::get('/pasien/add', [PasienController::class, 'pageAdd'])->middleware('auth');
Route::post('/pasien/add', [PasienController::class, 'add'])->middleware('auth');
Route::get('/pasien/edit/{pasien}', [PasienController::class, 'pageEdit'])->middleware('auth');
Route::post('/pasien/edit/{pasien}', [PasienController::class, 'edit'])->middleware('auth');
Route::delete('/pasien/delete/{pasien}', [PasienController::class, 'destroy'])->middleware('auth');