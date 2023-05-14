<?php

use App\Http\Controllers\SupermarketController;
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
Route::post("add-supermarkets",[SupermarketController::class, 'add']);
Route::get("list-supermarkets",[SupermarketController::class, 'list']);
Route::get("view-supermarket/{id}",[SupermarketController::class, 'view']);
Route::delete("delete-supermarket/{id}",[SupermarketController::class, 'delete']);
Route::post("update-supermarket/{id}",[SupermarketController::class, 'update']);
