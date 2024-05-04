<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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

Route::get('/welcome2', function () {
    return view('welcome2');
});

Route::get('users/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('/lang/{locale}', 'LocalizationController@set_Lang');
