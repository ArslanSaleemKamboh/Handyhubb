<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
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
Route::middleware(['guest:admin'])->group(function(){
Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('admin/login');
});
Route::middleware(['auth:admin'])->group(function(){
    Route::get('/',function(){
    return view('backend.pages.dashboard');
    })->name('admin');
    // Route::get('/categories',function(){
    //     return view('backend.pages.categories');
    // })->name('admin/categories');
    Route::resource('categories',CategoryController::class);
    Route::resource('users',UserController::class);
    // Route::get('/users',function(){
    //     return view('backend.pages.users');
    // })->name('admin/users');
    Route::post('/logout',[AuthController::class,'logout'])->name('admin/logout');
});
