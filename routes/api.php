<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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

Route::get('/accounts', [AccountController::class, 'index']);
Route::prefix('/account')->group( function () {
    Route::post('/store', [AccountController::class, 'store']);
    Route::put('/{username}', [AccountController::class, 'update']);
    Route::delete('/{id}', [AccountController::class, 'destroy']);
    Route::post('/signin/{username}&{password}', [AccountController::class, 'signin']);
    }
);


