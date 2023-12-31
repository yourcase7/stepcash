<?php

use App\Http\Controllers\BonusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RewardsController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/sync', [HomeController::class, 'sync'])->name('sync');

    Route::resource('rewards', RewardsController::class);
    Route::get('/rewards/claim/{$id}', [RewardsController::class, 'claim'])->name('rewardclaim');

    Route::get('/bonus', [BonusController::class, 'index']);
    Route::get('/bonus/get/{id}', [BonusController::class, 'view']);
    Route::post('/bonus/get/{id}', [BonusController::class, 'submit']);
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle']);

Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
