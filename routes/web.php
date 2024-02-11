<?php

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

Route::middleware(["auth"])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

Route::prefix('auth')->as('auth.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
    Route::get('{provider}/redirect', [\App\Http\Controllers\Auth\AuthController::class, 'redirect'])->name('redirect');
    Route::get('{provider}/callback', [\App\Http\Controllers\Auth\AuthController::class, 'callback'])->name('callback');
    Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
});
