<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SupermarketController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Supermarket CRUD APIs
Route::prefix('v1')->group(function(){
    Route::post("supermarkets/add",[SupermarketController::class, 'add']);
    Route::get("supermarkets/list",[SupermarketController::class, 'list']);
    Route::get("supermarkets/view/{id}",[SupermarketController::class, 'view']);
    Route::delete("supermarkets/delete/{id}",[SupermarketController::class, 'delete']);
    Route::post("supermarkets/update/{id}",[SupermarketController::class, 'update']);
    Route::post("supermarkets/supplier/upload/{id}",[SupermarketController::class, 'bulk']);
});
//Manager CRUD APIs
Route::prefix('v1')->group(function(){
    Route::post("managers/add",[ManagerController::class, 'store']);
    Route::get("managers/list",[ManagerController::class, 'list']);
    Route::get("managers/view/{id}",[ManagerController::class, 'view']);
    Route::delete("managers/delete/{id}",[ManagerController::class, 'delete']);
    Route::post("managers/update/{id}",[ManagerController::class, 'update']);
    Route::post("managers/employee/upload/{id}",[ManagerController::class, 'bulk']);
});

//Employee CRUD APIs
Route::prefix('v1')->group(function(){
    Route::post("employees/add",[EmployeeController::class, 'store']);
    Route::get("employees/list",[EmployeeController::class, 'list']);
    Route::get("employees/view/{id}",[EmployeeController::class, 'view']);
    Route::delete("employees/delete/{id}",[EmployeeController::class, 'delete']);
    Route::post("employees/update/{id}",[EmployeeController::class, 'update']);
});
//Supplier CRUD APIs
Route::prefix('v1')->group(function(){
    Route::post("suppliers/add",[SupplierController::class, 'store']);
    Route::get("suppliers/list",[SupplierController::class, 'list']);
    Route::get("suppliers/view/{id}",[SupplierController::class, 'view']);
    Route::delete("suppliers/delete/{id}",[SupplierController::class, 'delete']);
    Route::post("suppliers/update/{id}",[SupplierController::class, 'update']);
});
