<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta Categorias
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::post('/categories/new', [App\Http\Controllers\CategoryController::class, 'newCategory'])->name('new.category');
Route::put('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('update.category');
Route::delete('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete.category');

//Ruta Vehiculos
Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle');
Route::post('/vehicles/new', [App\Http\Controllers\VehicleController::class, 'newVehicle'])->name('new.vehicle');
Route::put('/vehicles/update/{id}', [App\Http\Controllers\VehicleController::class, 'updateVehicle'])->name('update.vehicle');
Route::delete('/vehicles/delete/{id}', [App\Http\Controllers\VehicleController::class, 'deleteVehicle'])->name('delete.vehicle');
