<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//company
Route::get('/', [CompanyController::class, 'Index'])->name('company.list')->middleware(['auth:sanctum']);
Route::get('/company', [CompanyController::class, 'Index'])->name('company.list')->middleware(['auth:sanctum']);
Route::get('/company/create', [CompanyController::class, 'Create'])->name('company.create')->middleware(['auth:sanctum']);
Route::post('/company/store', [CompanyController::class, 'Store'])->name('company.store')->middleware(['auth:sanctum']);
Route::get('/company/show/{id}', [CompanyController::class, 'Show'])->name('company.show')->middleware(['auth:sanctum']);
Route::get('/company/edit/{id}', [CompanyController::class, 'Edit'])->name('company.edit')->middleware(['auth:sanctum']);
Route::get('/company/destroy', [CompanyController::class, 'Destroy'])->name('company.destroy')->middleware(['auth:sanctum']);
Route::post('/company/update', [CompanyController::class, 'Update'])->name('company.update')->middleware(['auth:sanctum']);

//employee
Route::get('/employee', [EmployeeController::class, 'Index'])->name('employee.list')->middleware(['auth:sanctum']);
Route::get('/employee/create', [EmployeeController::class, 'Create'])->name('employee.create')->middleware(['auth:sanctum']);
Route::post('/employee/store', [EmployeeController::class, 'Store'])->name('employee.store')->middleware(['auth:sanctum']);
Route::get('/employee/show/{id}', [EmployeeController::class, 'Show'])->name('employee.show')->middleware(['auth:sanctum']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'Edit'])->name('employee.edit')->middleware(['auth:sanctum']);
Route::get('/employee/destroy', [EmployeeController::class, 'Destroy'])->name('employee.destroy')->middleware(['auth:sanctum']);
Route::post('/employee/update', [EmployeeController::class, 'Update'])->name('employee.update')->middleware(['auth:sanctum']);