<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Middleware\AuthAdmin;

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
Route::middleware(['auth', AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/brands/show', [AdminController::class, 'show'])->name('show.blade');
    Route::get('/admin/brands', [AdminController::class, 'add_brand'])->name('brand.brand.add');
    Route::post('/admin/brands/store', [AdminController::class, 'brand_store'])->name('brand.store');
});
