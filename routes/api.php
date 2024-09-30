<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//get api   for fetch user
Route::post('addusers', [UserController::class, 'addusers']);
// post data store
Route::get('/users/{id?}', [UserController::class, 'showUser']);



// multiple user
Route::post('/addmultipleusers', [UserController::class, 'addmultipleusers']);
// Added-categories

Route::post('/category-add', [CategoryController::class, 'Addcategory']);

