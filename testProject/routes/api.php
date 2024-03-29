<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RequestsController;
use App\Http\Controllers\AdminController;

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

Route::get('/requests/{access_token?}', [RequestsController::class, 'index']);
Route::post('/requests', [RequestsController::class, 'store'])->middleware('throttle:10,1');
Route::put('/requests/{id}/{access_token}', [RequestsController::class, 'update'])->middleware('throttle:10,1');
Route::delete('/requests/{id}', [RequestsController::class, 'delete'])->middleware('throttle:1,1');

Route::post('/create_token', [AdminController::class, 'store'])->middleware('throttle:10,1');
Route::post('/get_token', [AdminController::class, 'update'])->middleware('throttle:10,1');