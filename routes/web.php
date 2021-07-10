<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
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
Route::get('/home/profile/update', [UserController::class, 'edit'])->name('home.profile.update');
Route::get('/home/profile/show', [UserController::class, 'show'])->name('home.profile.show');
Route::post('/home/profile/save', [UserController::class, 'update'])->name('home.profile.save');
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');
Route::get('email/verify', [VerificationController::class,'verify'])->name('verification.verify');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/send', function(){
    Auth::user()->sendEmailVerificationNotification();
    return redirect()->route('home.profile.update')->with('success','Email verification link send to your email');
})->name('verification.send');
Route::get('home/change-password',[UserController::class,'changePassword'])->name('home.change_password');
Route::post('home/update-password',[UserController::class,'updatePassword'])->name('home.update_password');
});
