<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConquistadorController;
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

Route::get('/register/{id}', 'RegisterController@registerFromTutor')->name('register.tutor')->middleware('auth', 'rol:tutor');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/lang/{locale}', 'LocalizationController@set_Lang');

Route::post('/tutor/aceptar', 'TutorController@aceptar')->name('tutor.aceptar')->middleware('auth', 'rol:tutor');
Route::get('/tutor/pupilo/{id}', 'TutorController@show')->name('tutor.show')->middleware('auth', 'rol:tutor');
Route::get('/tutor', 'TutorController@index')->name('tutor')->middleware('auth', 'rol:tutor');

Route::get('/conquistador/{id}', 'ConquistadorController@clases')->name('conquistador.clases')->middleware('auth', 'rol:conquistador');
Route::get('/conquistador/tarea/{id}', 'ConquistadorController@tarea')->name('conquistador.tarea')->middleware('auth', 'rol:conquistador');
Route::get('/conquistador', 'ConquistadorController@invoke')->name('conquistador')->middleware('auth', 'rol:conquistador');

Route::post('/instructor/crear', 'InstructorController@crearClase')->name('instructor.crearClase')->middleware('auth', 'rol:instructor');
Route::post('/instructor/eliminar', 'InstructorController@eliminarClase')->name('instructor.eliminarClase')->middleware('auth', 'rol:instructor');
Route::post('/instructor/anadirAlumnos', 'InstructorController@anadirAlumnos')->name('instructor.anadirAlumnos')->middleware('auth', 'rol:instructor');
Route::post('/instructor/sendhw', 'InstructorController@sendhw')->name('instructor.sendhw')->middleware('auth', 'rol:instructor');
Route::post('/instructor/eliminarAlumnos', 'InstructorController@eliminarAlumnos')->name('instructor.eliminarAlumnos')->middleware('auth', 'rol:instructor');
Route::post('/instructor/crearTarea', 'InstructorController@crearTarea')->name('instructor.crearTarea')->middleware('auth', 'rol:instructor');
Route::post('/instructor/modificarTarea', 'InstructorController@modificarTarea')->name('instructor.modificarTarea')->middleware('auth', 'rol:instructor');
Route::post('/instructor/definer', 'InstructorController@definer')->name('instructor.definer')->middleware('auth', 'rol:instructor');
Route::get('/instructor/tarea/{id}', 'InstructorController@tarea')->name('instructor.tarea')->middleware('auth', 'rol:instructor');
Route::get('/instructor/crear', 'InstructorController@crear')->name('instructor.crear')->middleware('auth', 'rol:instructor');
Route::get('/instructor/conquistador/{id}', 'InstructorController@showConquistador')->name('instructor.showConquistador')->middleware('auth', 'rol:instructor');
Route::get('/instructor/{id}', 'InstructorController@clases')->name('instructor.clases')->middleware('checkinstructor');
Route::get('/instructor', 'InstructorController@index')->name('instructor.index')->middleware('auth', 'rol:instructor');

Route::get('/municipios', [MunicipioPaisController::class, '__invoke'])->middleware('auth', 'rol:admin');
