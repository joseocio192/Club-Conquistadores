<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
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

Route::get('/welcome2', LocalizationController::class);

Route::get('users/{id}', function ($id) {
    return 'User ' . $id;
});

Route::post('/welcome2', [LocalizationController::class, 'set_Lang']);

Route::post('/setlocale', 'LocalizationController@setLocale')->name('setlocale');
