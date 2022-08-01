<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIController;
use App\Http\Controllers\APIEmController;
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


Route::resource('api',APIController::class);
Route::resource('apie',APIEmController::class);



Route::get('/companies', [APIController::class, 'index']);


Route::post('/companies', [APIController::class, 'store']);

Route::post('/companies/update/{id}', [APIController::class, 'update']);
Route::delete('/companies/delete/{id}', [APIController::class, 'delete']);



Route::get('/employees', [APIEmController::class, 'index']);

Route::post('/employees', [APIEmController::class, 'store']);

Route::put('/employees/update/{id}', [APIEmController::class, 'update']);
Route::delete('/employees/delete/{id}', [APIEmController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

