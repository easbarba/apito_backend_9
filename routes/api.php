<?php

declare(strict_types=1);

use App\Http\Controllers\RefereeController;
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

Route::prefix('referees')->group(function() {
    Route::get('/', [RefereeController::class, 'index']);
    Route::get('/{article}', [RefereeController::class, 'show']);
    Route::post('/', [RefereeController::class, 'store']);
    Route::put('/{article}', [RefereeController::class, 'update']);
    Route::delete('/{article}', [RefereeController::class, 'delete']);
});
