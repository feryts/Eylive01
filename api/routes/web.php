<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return response()->json([
        'application' => 'EyLive API',
        'version' => '1.0.0',
        'status' => 'online',
    ]);

});
