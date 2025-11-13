<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make s
|
*/

// Test routes
Route::get('/test', function () {
    return response()->json([
        'message' => 'Device Sandbox API is working!',
        'status' => 'success',
        'timestamp' => now(),
        'data' => [
            'service' => 'Device Sandbox API',
            'version' => '1.0',
            'endpoints' => [
                '/api/test' => 'Test endpoint',
                '/api/hello' => 'Simple greeting',
                '/api/health' => 'Health check',
                '/api/db-test' => 'Database connection test'
            ]
        ]
    ]);
});
