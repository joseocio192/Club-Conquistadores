<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConquistadorController;
use App\Http\Controllers\DirectivoController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterTutorController;
use App\Http\Controllers\MunicipioPaisController;
use App\Http\Controllers\TutorController;

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

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/registerTutorLegal', [RegisterTutorController::class, 'showRegistrationForm'])->name('registerTutorLegal');
Route::post('/registerTutorLegal', [RegisterTutorController::class, 'register']);

Route::get('/registerInstructor', [RegisterController::class, 'showRegistrationForm'])->name('registerInstructor');
Route::post('/registerInstructor', [RegisterController::class, 'register']);
Route::get('/register/{id}', [RegisterController::class, 'registerFromTutor'])
    ->name('register.tutor')
    ->middleware('auth', 'rol:tutor');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/lang/{locale}', [LocalizationController::class, 'set_Lang']);

Route::post('/tutor/aceptar/{id}', [TutorController::class, 'aceptar'])
    ->name('tutor.aceptar')
    ->middleware('auth', 'rol:tutor');
Route::get('/tutor/pupilo/{id}', [TutorController::class, 'show'])
    ->name('tutor.show')
    ->middleware('auth', 'rol:tutor');
Route::get('/tutor', [TutorController::class, 'index'])
    ->name('tutor')
    ->middleware('auth', 'rol:tutor');
Route::post('/tutor/generateOneTimeCode', [TutorController::class, 'generateOneTimeCode'])
    ->name('tutor.generateOneTimeCode')
    ->middleware('auth', 'rol:tutor');

Route::get('/conquistador/{id}', [ConquistadorController::class, 'clases'])
    ->name('conquistador.clases')
    ->middleware('auth', 'rol:conquistador');
Route::get('/conquistador/tarea/{id}', [ConquistadorController::class, 'tarea'])
    ->name('conquistador.tarea')
    ->middleware('auth', 'rol:conquistador');

Route::get('/conquistador', [ConquistadorController::class, 'invoke'])
    ->name('conquistador')
    ->middleware('auth', 'rol:conquistador');

Route::post('/instructor/crear', [InstructorController::class, 'crearClase'])
    ->name('instructor.crearClase')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/eliminar', [InstructorController::class, 'eliminarClase'])
    ->name('instructor.eliminarClase')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/anadirAlumnos', [InstructorController::class, 'anadirAlumnos'])
    ->name('instructor.anadirAlumnos')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/sendhw', [InstructorController::class, 'sendhw'])
    ->name('instructor.sendhw')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/eliminarAlumnos', [InstructorController::class, 'eliminarAlumnos'])
    ->name('instructor.eliminarAlumnos')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/crearTarea', [InstructorController::class, 'crearTarea'])
    ->name('instructor.crearTarea')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/modificarTarea', [InstructorController::class, 'modificarTarea'])
    ->name('instructor.modificarTarea')
    ->middleware('auth', 'rol:instructor');
Route::post('/instructor/definer', [InstructorController::class, 'definer'])
    ->name('instructor.definer')
    ->middleware('auth', 'rol:instructor');
Route::get('/instructor/tarea/{id}', [InstructorController::class, 'tarea'])
    ->name('instructor.tarea')
    ->middleware('auth', 'rol:instructor');
Route::get('/instructor/crear', [InstructorController::class, 'crear'])
    ->name('instructor.crear')
    ->middleware('auth', 'rol:instructor');
Route::get('/instructor/conquistador/{id}', [InstructorController::class, 'showConquistador'])
    ->name('instructor.showConquistador')
    ->middleware('auth', 'rol:instructor');
Route::get('/instructor/{id}', [InstructorController::class, 'clases'])
    ->name('instructor.clases')
    ->middleware('checkinstructor');
Route::get('/instructor', [InstructorController::class, 'index'])
    ->name('instructor.index')
    ->middleware('auth', 'rol:instructor');

Route::get('/directivo/altaDirectivo', [DirectivoController::class, 'altaDirectivo'])
    ->name('directivo.altaDirectivo')
    ->middleware('auth', 'rol:directivo');
Route::get('/directivo/altaInstructor', [DirectivoController::class, 'altaInstructor'])
    ->name('directivo.altaInstructor')
    ->middleware('auth', 'rol:directivo');
Route::get('/directivo/club/{id}', [DirectivoController::class, 'club'])
    ->name('directivo.club')
    ->middleware('auth', 'rol:directivo');
Route::get('/directivo/stats/{id}', [DirectivoController::class, 'stats'])
    ->name('directivo.stats')
    ->middleware('auth', 'rol:directivo');
Route::get('/directivo/crearclubview', [DirectivoController::class, 'crearclubview'])
    ->name('directivo.crearclubview')
    ->middleware('auth', 'rol:directivo');
Route::post('/directivo/crearclub', [DirectivoController::class, 'crearclub'])
    ->name('directivo.crearclub')
    ->middleware('auth', 'rol:directivo');
Route::get('/directivo', [DirectivoController::class, 'index'])
    ->name('directivo')
    ->middleware('auth', 'rol:directivo');
Route::post('/directivo/addInstructor', [DirectivoController::class, 'addInstructor'])
    ->name('directivo.addInstructor')
    ->middleware('auth', 'rol:directivo');
Route::get('/municipios', [MunicipioPaisController::class, '__invoke'])
    ->middleware('auth', 'rol:admin');

Route::post('/pais', [LocalizationController::class, 'addPais'])
    ->name('location.pais.add')
    ->middleware('auth', 'rol:directivo');
Route::post('/estado', [LocationController::class, 'addEstado'])
    ->name('location.estado.add')
    ->middleware('auth', 'rol:directivo');
Route::post('/municipio', [LocationController::class, 'addMunicipio'])
    ->name('location.municipio.add')
    ->middleware('auth', 'rol:directivo');
Route::post('/ciudad', [LocationController::class, 'addCiudad'])
    ->name('location.ciudad.add')
    ->middleware('auth', 'rol:directivo');
Route::post('/especialidad', [LocationController::class, 'addEspecialidad'])
    ->name('especialidad.add')
    ->middleware('auth', 'rol:directivo');
