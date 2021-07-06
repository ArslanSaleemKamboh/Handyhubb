<?php

use Illuminate\Support\Facades\Auth;
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
    return view('frontend.pages.home');
});
Route::prefix('providers')->group(function(){
    Route::get('/list', function () {
        return view('frontend.pages.providers.list');
    });
    Route::get('/single/{id}', function () {
        return view('frontend.pages.providers.show');
    })->name('providers.single');
});
Route::prefix('jobs')->group(function(){
Route::get('/list', function () {
    return view('frontend.pages.jobs.list');
});
Route::get('/single/{id}', function () {
    return view('frontend.pages.jobs.show');
})->name('jobs.single');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
