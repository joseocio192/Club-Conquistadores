<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConquistadorConstroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('users/{id}', function ($id) {
    return 'User '.$id;
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/welcome2', function () {
    return view('welcome2');
});

Route::get('users/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('/lang/{locale}', 'LocalizationController@set_Lang');
Route::get('conquistador', [ConquistadorConstroller::class, 'invoke']);
Route::get('conquistador/{id}', [ConquistadorConstroller::class, 'show']);

