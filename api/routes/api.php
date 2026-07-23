<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\AgencyController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->controller(AuthController::class)->group(function () {

    Route::post('/register', 'register');

    Route::post('/login', 'login');

});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    Route::prefix('auth')
        ->controller(AuthController::class)
        ->group(function () {

            Route::get('/me', 'me');

            Route::post('/logout', 'logout');

        });

    /*
    |--------------------------------------------------------------------------
    | Wallet
    |--------------------------------------------------------------------------
    */

    Route::prefix('wallet')
        ->controller(WalletController::class)
        ->group(function () {

            Route::get('/', 'index');

            Route::get('/history', 'history');

        });

    /*
    |--------------------------------------------------------------------------
    | Agencies
    |--------------------------------------------------------------------------
    */

    Route::prefix('agencies')
        ->controller(AgencyController::class)
        ->group(function () {

            // Aktif ajanslar
            Route::get('/', 'index');

            // Ajansa başvur
            Route::post('/join', 'join');

            // Yakında eklenecek
            // Route::get('/my', 'myAgency');
            // Route::get('/requests', 'myRequests');
            // Route::post('/leave', 'leave');

        });

});
