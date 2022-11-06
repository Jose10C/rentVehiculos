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
/* Vista Principal */
Route::get('/', [\App\Http\Controllers\ViewController::class, 'viewMain'])->name('welcome');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'inicial'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/home/newrenta/{id_veh}', [App\Http\Controllers\ViewController::class, 'usernewRent'])->name('new.home');
    
    /* Ruta Categorias */
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::post('/categories/new', [App\Http\Controllers\CategoryController::class, 'newCategory'])->name('new.category');
    Route::put('/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('update.category');
    Route::delete('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('delete.category');

    /* Ruta Vehiculos */
    Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle');
    Route::post('/vehicles/new', [App\Http\Controllers\VehicleController::class, 'newVehicle'])->name('new.vehicle');
    Route::put('/vehicles/update/{id}', [App\Http\Controllers\VehicleController::class, 'updateVehicle'])->name('update.vehicle');
    Route::delete('/vehicles/delete/{id}', [App\Http\Controllers\VehicleController::class, 'deleteVehicle'])->name('delete.vehicle');

    /* Ruta Rentas */
    Route::get('/rents', [App\Http\Controllers\RentController::class, 'index'])->name('rent');
    Route::post('/rents/new', [App\Http\Controllers\RentController::class, 'newRent'])->name('new.rent');
    Route::put('/rents/update/{renta}', [App\Http\Controllers\RentController::class, 'updateRent'])->name('update.rent');
    Route::delete('/rents/delete/{id}', [App\Http\Controllers\RentController::class, 'deleteRent'])->name('delete.rent');

    /* Ruta Cliets */
    Route::get('/clients', [App\Http\Controllers\HomeController::class, 'listClientes'])->name('client');
    Route::delete('/clients/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteClientes'])->name('delete.client');

    /* pedidos */
    Route::get('/pedidos', [App\Http\Controllers\HomeController::class, 'viewPedidos'])->name('view');

    /* promocionar para rentar */
    Route::get('/iamrents', [\App\Http\Controllers\ViewController::class, 'viewiamRent']);
    Route::post('/iamrents/new', [\App\Http\Controllers\ViewController::class, 'iamRent']);
});