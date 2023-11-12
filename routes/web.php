<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

//routing pada vehicle
Route::get('/vehicle/vehicle_index', [VehicleController::class, 'index'])->name('vehicle.vehicle_index');
Route::get('/vehicle/vehicle_create', [VehicleController::class, 'create'])->name('vehicle.vehicle_create');
Route::post('/vehicles/vehicle_store', [VehicleController::class, 'store'])->name('vehicle.vehicle_store');
Route::get('/vehicle/vehicle_edit/{id}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.vehicle_edit');
Route::post('/vehicle/vehicle_update/{id}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicle.vehicle_update');
Route::get('/vehicle/vehicle_delete/{id}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicle.vehicle_delete');

//routing pada customer
Route::get('/customer/customer_index', [CustomerController::class, 'index'])->name('customer.customer_index');
Route::get('/customer/customer_create', [CustomerController::class, 'create'])->name('customer.customer_create');
Route::post('/customer/customer_store', [CustomerController::class, 'store'])->name('customer.customer_store');
Route::get('/customer/customer_edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.customer_edit');
Route::post('/customer/customer_update/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.customer_update');
Route::get('/customer/customer_delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.customer_delete');

//routing pada order
Route::get('/order/order_index/{id}', [OrderController::class, 'index'])->name('order.order_index');
Route::get('/order/{id}/order_create', [OrderController::class, 'create'])->name('order.order_create');
Route::post('/order/{id}/order_store', [OrderController::class, 'store'])->name('order.order_store');
Route::get('/order/delete/{orderId}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.order_delete');
Route::get('/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('order.order_edit');
Route::post('/order/update/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('order.order_update');



