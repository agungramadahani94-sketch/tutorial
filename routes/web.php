<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect()->route('login.hospital');
})->name('login');

Route::get('/login/hospital', [LoginController::class, 'showHospital'])->name('login.hospital');
Route::get('/login/restaurant', [LoginController::class, 'showRestaurant'])->name('login.restaurant');
Route::get('/login/store', [LoginController::class, 'showStore'])->name('login.store');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/theme', [DashboardController::class, 'changeTheme'])->name('dashboard.theme');
    Route::get('/dashboard/{role}', [DashboardController::class, 'showRoleSection'])
        ->middleware(\App\Http\Middleware\CheckRole::class)
        ->name('dashboard.role');
});
