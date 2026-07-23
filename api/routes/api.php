<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| EyLive API v1
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'app' => 'EyLive API',
        'version' => '1.0.0',
        'status' => 'online',
    ]);
});

Route::prefix('v1')->group(function () {

    Route::get('/health', function () {
        return response()->json([
            'success' => true,
            'server' => 'OK',
            'time' => now(),
        ]);
    });

    Route::get('/version', function () {
        return response()->json([
            'app' => 'EyLive',
            'version' => '1.0.0',
            'laravel' => app()->version(),
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    Route::prefix('auth')->group(function () {

        Route::post('/register', function () {
            return response()->json([
                'message' => 'Register API Coming Soon'
            ]);
        });

        Route::post('/login', function () {
            return response()->json([
                'message' => 'Login API Coming Soon'
            ]);
        });

        Route::post('/logout', function () {
            return response()->json([
                'message' => 'Logout API Coming Soon'
            ]);
        });

    });

});
