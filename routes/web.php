<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckLogin;
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
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login-process');
Route::middleware([CheckLogin::class])->group(function (){

    Route::get('/', function () {

        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::resource('post',App\Http\Controllers\PostController::class);
    Route::resource('admin',App\Http\Controllers\AdminController::class);

});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
