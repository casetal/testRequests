<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RequestsController;

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

Route::get('requests', [RequestsController::class, 'index']);
Route::post('requests', [RequestsController::class, 'store']);
Route::put('/requests/{id}', [RequestsController::class, 'update']);