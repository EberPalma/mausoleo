<?php

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
//RUTAS SIN AUTH
Route::get('/', function () {return view('welcome');});
Route::get('/guest', function () {return view('layouts.app');});
Route::get('/register', function () {return view('auth.register');})->name('register');


//RUTAS CON AUTH 
Route::get('/plantilla', function () {return view('index');})->name('index');
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');



// Rutas con controlador (Aun no formadas)

Route::get('/login', function () {return view('auth.login');})->name('login');

//Envio de verificación
Route::get('/verify', function () {return view('auth.verify');})->name('verify');

//Reenvio de confirmación (sin función)
Route::get('/verify', function () {return view('auth.verify');})->name('verification.resend');

//Administrativos CRUD
//Contacto
Route::get('/contacto', function () {return view('layouts.contacto.index');})->name('contacto');
//Usuarios
Route::get('/usuarios', function () {return view('users.listausuarios');})->name('usuarios');
Route::get('/profile.edit', function () {return view('profile.edit');})->name('profile.edit');
Route::get('/pageindex', function () {return view('page.index');})->name('page.index');
Route::get('/profile.update', function () {return view('profile.update');})->name('profile.update');
Route::get('/profile.password', function () {return view('profile.password');})->name('profile.password');
//Nichos
Route::get('/nichos', function () {return view('layouts.nichos.index');})->name('nichos');
//Difuntos
Route::get('/difuntos', function () {return view('layouts.difuntos.index');})->name('difuntos');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
