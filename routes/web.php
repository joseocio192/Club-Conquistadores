<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConquistadorConstroller;
use App\Http\Controllers\RegisterTutorController;
use App\Http\Controllers\MunicipioPaisController;

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
})->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/registerTutorLegal', [RegisterTutorController::class, 'showRegistrationForm'])->name('registerTutorLegal');
Route::post('/registerTutorLegal', [RegisterTutorController::class, 'register']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/lang/{locale}', 'LocalizationController@set_Lang');

Route::get('/conquistador/{id}', 'ConquistadorConstroller@show')->name('conquistador.show')->middleware('checkuser');
Route::get('/conquistador', 'ConquistadorConstroller@invoke')->middleware('auth', 'rol:conquistador');

Route::get('/instructor/{id}', 'InstructorController@show')->name('instructor.show')->middleware('checkinstructor');
Route::get('/instructor', 'InstructorController@index')->middleware('auth', 'rol:instructor');

Route::get('/municipios', [MunicipioPaisController::class, '__invoke'])->middleware('auth', 'rol:admin');
