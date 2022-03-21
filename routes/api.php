<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::get('view/{id?}', [DataController::class, 'view']);

Route::post('create', [DataController::class, 'store']);

Route::put('update', [DataController::class, 'update']);

Route::delete('delete/{id}', [DataController::class, 'destroy']);

Route::get('search/{keyword}', [DataController::class, 'search']);
