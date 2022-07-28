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

// Route::get('/companies', [CompanyController::class, 'index']);

// Route::post('/companies/update/{id}', [CompanyController::class, 'update']);
// Route::delete('/companies/delete/{id}', [CompanyController::class, 'delete']);


// Route::get('/employees', [EmployeeController::class, 'index']);

// Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);
// Route::delete('/employees/delete/{id}', [EmployeeController::class, 'delete']);
Route::resource('api',APIController::class);
Route::resource('apie',APIEmController::class);

Route::get('/companies', [APIController::class, 'index']);
Route::post('/companies', [APIController::class, 'store']);
Route::post('/companies/create', [APIController::class, 'create']);
Route::post('/companies/update/{id}', [APIController::class, 'update']);
Route::delete('/companies/delete/{id}', [APIController::class, 'delete']);


Route::get('/employees', [APIEmController::class, 'index']);
Route::post('/employees', [APIEmController::class, 'store']);
Route::post('/employees/create', [APIEmController::class, 'create']);
Route::post('/employees/update/{id}', [APIEmController::class, 'update']);
Route::delete('/employees/delete/{id}', [APIEmController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

