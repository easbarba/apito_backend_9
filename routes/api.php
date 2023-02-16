<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('referees', \App\Http\Controllers\RefereeController::class);
    Route::apiResource('teams', \App\Http\Controllers\TeamController::class);

    Route::fallback(function () {
        return response()->json(['message' => 'Route Not Found'], 404);
    })->name('api.fallback.404');
});
