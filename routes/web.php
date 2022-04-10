<?php
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\ContactoController;
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
Route::get('/', function () {return view('layouts.guest.index');});
Route::get('/administracion', function () {return view('welcome');});
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
//Codigo QR
Route::get('/codigoqr',  [App\Http\Controllers\QRController::class, 'index'])->name('codigoqr');
Route::get('/descargar/qr/{id}', [App\Http\Controllers\QRController::class, 'descargar'])->name('qr.descargar');
//Contacto
Route::get('/contacto', function () {return view('layouts.contacto.index');})->name('contacto');
//Usuarios
Route::get('/usuarios', function () {return view('users.listausuarios');})->name('usuarios');
Route::get('/profile.edit', function () {return view('profile.edit');})->name('profile.edit');
Route::get('/profile.editar/{id}', [App\Http\Controllers\UserController::class, 'editar'])->name('profile.editar');
Route::get('/pageindex', function () {return view('page.index');})->name('page.index');
Route::get('/profile.update', function () {return view('profile.update');})->name('profile.update');
Route::get('/profile.password', function () {return view('profile.password');})->name('profile.password');
//Nichos
Route::get('/nichos', function () {return view('layouts.nichos.index');})->name('nichos');
Route::get('/nicho.añadir', function () {return view('layouts.nichos.create');})->name('nicho.añadir');
Route::get('/nicho.editar/{id}', [App\Http\Controllers\NichosController::class, 'edit'])->name('nicho.editar');
//Difuntos
Route::get('/difuntos', function () {return view('layouts.difuntos.index');})->name('difuntos');
Route::get('/difunto.editar/{id}', [App\Http\Controllers\BeneficiariosController::class, 'edit'])->name('difuntos.update');
Route::get('/difunto.añadir', function () {
    $nichos = \DB::table('nichos')->select('id', 'coordenada')->where('familia','<>',null)->get();
    return view('layouts.difuntos.create')
    ->with('nichos', $nichos);
})->name('difunto.añadir');
// Calendario Mausoleo Santa Clara
Route::get('/calendario',  [App\Http\Controllers\FullCalendarController::class, 'index'])->name('calendario.index');
Route::post('/calendario/action',  [App\Http\Controllers\FullCalendarController::class, 'action']);
//Invitado
Route::get('/invitado.contacto', function () {return view('layouts.invitado.contacto');})->name('invitado.contacto');
Route::get('/invitado.contacto-confirmacion', function () {return view('layouts.invitado.confirmacion-contacto');})->name('invitado.confirmacion-contacto');
Route::post('/invitado.contacto/action', [App\Http\Controllers\ContactoController::class, 'store1']);
Route::get('/invitado.menu', function () {return view('layouts.invitado.invitadomenu');})->name('invitado.menu');
Route::get('/presentacion', [App\Http\Controllers\PresentacionController::class, 'index']);
Route::get('/presentacion/json', [App\Http\Controllers\PresentacionController::class, 'indexjson']);
Route::get('/inicio', function () {return view('layouts.guest.index');})->name('inicio');
Route::get('/productos', function () {return view('layouts.guest.productos');})->name('productos');
Route::get('/RecordamosEsteMes', function () {return view('layouts.guest.Mes');})->name('RecordamosEsteMes');
Route::get('/RecordamosHoy', function () {return view('layouts.guest.Hoy');})->name('RecordamosHoy');


Auth::routes();


Route::get('/qr_generate', [App\Http\Controllers\QRController::class, 'qr_generate'])->name('qr_generate');

Route::get('Informacion/Nicho/{coordenada}', [App\Http\Controllers\NichosController::class, 'informacion'])->name('infoController');