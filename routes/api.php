<?php

use App\Http\Controllers\API\BlogBodyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    //
});
// User routes
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('editUser/{id}', [UserController::class, 'update']);
Route::get('allUsers', [UserController::class, 'getAllUsers']);
Route::delete('deleteUser/{id}', [UserController::class, 'destroy']);
// Blog routes
Route::post('saveBlog', [BlogController::class, 'store']);
//Category routes
Route::post('saveCategory', [CategoryController::class, 'store']);
Route::get('getCategories', [CategoryController::class, 'index']);
//BlogBody routes
Route::post('saveBlogBody', [BlogBodyController::class, 'store']);
