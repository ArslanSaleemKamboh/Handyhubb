<?php

use App\Http\Controllers\User\JobController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\Auth\VerificationController;

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
})->name('main');
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
Route::middleware(['auth:web'])->group(function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'user','as'=>'user.'], function(){
    Route::get('/profile', [UserController::class, 'edit'])->name('profile');
    Route::post('/update', [UserController::class, 'update'])->name('update');
  
    Route::get('/change_password', [UserController::class, 'changePassword'])->name('change_password');
    Route::post('/change_password', [UserController::class, 'update'])->name('change_password');

    
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('/add-Job/{id?}', [JobController::class, 'addJob'])->name('add-Job');
    Route::post('/add-Job', [JobController::class, 'postJob'])->name('add-Job');
    Route::get('/delete-job/{id?}', [JobController::class, 'deleteJob'])->name('delete-job');
});

});