<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('employees',EmployeeController::class);
Route::resource('companies',CompanyController::class);




Auth::routes([
    'register' => false, // Registration Routes...
  ]);


    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::post('/companies/create', [CompanyController::class, 'create'])->name('companies.create') ;
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::get('/companies/delete/{id}', [CompanyController::class, 'delete'])->name('companies.delete');
    Route::put('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
    
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index') ;
    Route::post('/employees/create', [EmployeeController::class, 'create'])->name('employees.create') ;
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::get('/employees/delete/{id}', [EmployeeController::class, 'delete'])->name('employees.delete');
    Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/companies/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});


