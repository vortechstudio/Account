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
    Route::get('/', \App\Livewire\Home::class)->name('home');
});

Route::middleware(["auth"])->group(function () {
    Route::prefix('account')->as('account.')->middleware(["password.confirm"])->group(function () {
        Route::get('/', \App\Livewire\Account\App::class)->name('app');
        Route::get('/mbrHistory', \App\Livewire\Account\MbrHistory::class)->name('mbrHistory');
        Route::get('/loginHistory', \App\Livewire\Account\LoginHistory::class)->name('loginHistory');
        Route::get('/rgpd', \App\Livewire\Account\Rgpd::class)->name('rgpd');
        Route::get('/rgpd/download', \App\Http\Controllers\Account\RgpdExportController::class)->name('rgpd.export');
    });

    Route::prefix('services')->as('services.')->group(function () {
        Route::get('/', \App\Livewire\Service\Service::class)->name('dashboard');
    });
});
Route::get('/test', function () {
    $tracking = new \IvanoMatteo\LaravelDeviceTracking\LaravelDeviceTracking();
    dd($tracking->detect());
});

Route::prefix('auth')->as('auth.')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
    Route::get('{provider}/redirect', [\App\Http\Controllers\Auth\AuthController::class, 'redirect'])->name('redirect');
    Route::get('{provider}/callback', [\App\Http\Controllers\Auth\AuthController::class, 'callback'])->name('callback');
    Route::get('{provider}/setup/{email}', \App\Livewire\Auth\SetupRegister::class)->name('setup-register');
    Route::get('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
    Route::post('password-confirm', [\App\Http\Controllers\Auth\AuthController::class, 'confirmPassword'])
        ->name('confirm-password')
        ->middleware(["auth", "throttle:6,1"]);
});

Route::get('password-confirm', [\App\Http\Controllers\Auth\AuthController::class, 'confirmPasswordForm'])
    ->name('password.confirm')
    ->middleware('auth');

