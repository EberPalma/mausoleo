<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NichosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AvalesController;
use App\Http\Controllers\BeneficiariosController;
use App\Http\Controllers\Cat_modController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\Contrato_creditoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HuespedesController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\RecibosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\session\SessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para los nichos
Route::GET('/nichosindex', [NichosController::class, 'index'])->name('nichosIndex');
Route::POST('/nichosstore', [NichosController::class, 'store'])->name('nichosStore');
Route::GET('/nichosshow/{id}', [NichosController::class, 'show'])->name('nichosShow');
Route::PUT('/nichosupdate/{id}', [NichosController::class, 'update'])->name('nichosUpdate');
Route::GET('/nichosdelete/{id}', [NichosController::class, 'destroy'])->name('nichosdestroy');

//Rutas para los clientes
Route::GET('/clientesindex', [ClientesController::class, 'index'])->name('clientesIndex');
Route::POST('/clientesstore', [ClientesController::class, 'store'])->name('clientesStore');
Route::GET('/clientesshow/{id}', [ClientesController::class, 'show'])->name('clientesShow');
Route::PUT('/clientesupdate/{id}', [ClientesController::class, 'update'])->name('clientesUpdate');
Route::GET('/clientesdelete/{id}', [ClientesController::class, 'destroy'])->name('clientesdestroy');

//Rutas para los avales
Route::GET('/avalesindex', [AvalesController::class, 'index'])->name('avalesIndex');
Route::POST('/avalesstore', [AvalesController::class, 'store'])->name('avalesStore');
Route::GET('/avalesshow/{id}', [AvalesController::class, 'show'])->name('avalesShow');
Route::PUT('/avalesupdate/{id}', [AvalesController::class, 'update'])->name('avalesUpdate');
Route::GET('/avalesdelete/{id}', [AvalesController::class, 'destroy'])->name('avalesdestroy');

//Rutas para los beneficiarios
Route::GET('/beneficiariosindex', [BeneficiariosController::class, 'index'])->name('beneficiariosIndex');
Route::POST('/beneficiariosstore', [BeneficiariosController::class, 'store'])->name('beneficiariosStore');
Route::GET('/beneficiariosshow/{id}', [BeneficiariosController::class, 'show'])->name('beneficiariosShow');
Route::PUT('/beneficiariosupdate/{id}', [BeneficiariosController::class, 'update'])->name('beneficiariosUpdate');
Route::GET('/beneficiariosdelete/{id}', [BeneficiariosController::class, 'destroy'])->name('beneficiariosdestroy');

//Rutas para cat_mod
Route::GET('/cat_modindex', [Cat_modController::class, 'index'])->name('cat_modIndex');
Route::POST('/cat_modstore', [Cat_modController::class, 'store'])->name('cat_modStore');
Route::GET('/cat_modshow/{id}', [Cat_modController::class, 'show'])->name('cat_modShow');
Route::PUT('/cat_modupdate/{id}', [Cat_modController::class, 'update'])->name('cat_modUpdate');
Route::GET('/cat_moddelete/{id}', [Cat_modController::class, 'destroy'])->name('cat_moddestroy');

//Rutas para los niveles
Route::GET('/nivelesindex', [NivelController::class, 'index'])->name('nivelesIndex');
Route::POST('/nivelesstore', [NivelController::class, 'store'])->name('nivelesStore');
Route::GET('/nivelesshow/{id}', [NivelController::class, 'show'])->name('nivelesShow');
Route::PUT('/nivelesupdate/{id}', [NivelController::class, 'update'])->name('nivelesUpdate');
Route::GET('/nivelesdelete/{id}', [NivelController::class, 'destroy'])->name('nivelesdestroy');

//Rutas para los roles
Route::GET('/rolesindex', [RolesController::class, 'index'])->name('rolesIndex');
Route::POST('/rolesstore', [RolesController::class, 'store'])->name('rolesStore');
Route::GET('/rolesshow/{id}', [RolesController::class, 'show'])->name('rolesShow');
Route::PUT('/rolesupdate/{id}', [RolesController::class, 'update'])->name('rolesUpdate');
Route::GET('/rolesdelete/{id}', [RolesController::class, 'destroy'])->name('rolesdestroy');

//Rutas para las configuraciones
Route::GET('/configindex', [ConfigController::class, 'index'])->name('configIndex');
Route::POST('/configstore', [ConfigController::class, 'store'])->name('configStore');
Route::GET('/configshow/{id}', [ConfigController::class, 'show'])->name('configShow');
Route::PUT('/configupdate/{id}', [ConfigController::class, 'update'])->name('configUpdate');
Route::GET('/configdelete/{id}', [ConfigController::class, 'destroy'])->name('configdestroy');

//Rutas para los contratos
Route::GET('/contratoindex', [ContratosController::class, 'index'])->name('contratoIndex');
Route::POST('/contratostore', [ContratosController::class, 'store'])->name('contratoStore');
Route::GET('/contratoshow/{id}', [ContratosController::class, 'show'])->name('contratoShow');
Route::PUT('/contratoupdate/{id}', [ContratosController::class, 'update'])->name('contratoUpdate');
Route::GET('/contratodelete/{id}', [ContratosController::class, 'destroy'])->name('contratodestroy');

//Rutas para los contratos a credito
Route::GET('/contratocreditoindex', [Contrato_creditoController::class, 'index'])->name('contratocreditoIndex');
Route::POST('/contratocreditostore', [Contrato_creditoController::class, 'store'])->name('contratocreditoStore');
Route::GET('/contratocreditoshow/{id}', [Contrato_creditoController::class, 'show'])->name('contratocreditoShow');
Route::PUT('/contratocreditoupdate/{id}', [Contrato_creditoController::class, 'update'])->name('contratocreditoUpdate');
Route::GET('/contratocreditodelete/{id}', [Contrato_creditoController::class, 'destroy'])->name('contratocreditodestroy');

//Rutas para los usuarios
Route::GET('/userindex/{filtro}', [UserController::class, 'index'])->name('userIndex');
Route::POST('/userstore', [UserController::class, 'store'])->name('userStore');
Route::GET('/usershow/{id}', [UserController::class, 'show'])->name('userShow');
Route::PUT('/userupdate/{id}', [UserController::class, 'update'])->name('userUpdate');
Route::GET('/userdelete/{id}', [UserController::class, 'destroy'])->name('userdestroy');

//Rutas para los huespedes
Route::GET('/huespedindex', [HuespedesController::class, 'index'])->name('huespedIndex');
Route::POST('/huespedstore', [HuespedesController::class, 'store'])->name('huespedStore');
Route::GET('/huespedshow/{id}', [HuespedesController::class, 'show'])->name('huespedShow');
Route::PUT('/huespedupdate/{id}', [HuespedesController::class, 'update'])->name('huespedUpdate');
Route::GET('/huespeddelete/{id}', [HuespedesController::class, 'destroy'])->name('huespeddestroy');

//Rutas para los vendedores
Route::GET('/vendedorindex', [VendedoresController::class, 'index'])->name('vendedorIndex');
Route::POST('/vendedorstore', [VendedoresController::class, 'store'])->name('vendedorStore');
Route::GET('/vendedorshow/{id}', [VendedoresController::class, 'show'])->name('vendedorShow');
Route::PUT('/vendedorupdate/{id}', [VendedoresController::class, 'update'])->name('vendedorUpdate');
Route::GET('/vendedordelete/{id}', [VendedoresController::class, 'destroy'])->name('vendedordestroy');

//Rutas para los pagos
Route::GET('/pagoindex', [PagosController::class, 'index'])->name('pagoIndex');
Route::POST('/pagostore', [PagosController::class, 'store'])->name('pagoStore');
Route::GET('/pagoshow/{id}', [PagosController::class, 'show'])->name('pagoShow');
Route::PUT('/pagoupdate/{id}', [PagosController::class, 'update'])->name('pagoUpdate');
Route::GET('/pagodelete/{id}', [PagosController::class, 'destroy'])->name('pagodestroy');

//Rutas para los recibos
Route::GET('/reciboindex', [RecibosController::class, 'index'])->name('recibosIndex');
Route::POST('/recibostore', [RecibosController::class, 'store'])->name('recibosStore');
Route::GET('/reciboshow/{id}', [RecibosController::class, 'show'])->name('recibosShow');
Route::PUT('/reciboupdate/{id}', [RecibosController::class, 'update'])->name('recibosUpdate');
Route::GET('/recibodelete/{id}', [RecibosController::class, 'destroy'])->name('recibosdestroy');

//Rutas para el contacto
Route::GET('/contactoindex/{filtro}/{activo}', [ContactoController::class, 'index'])->name('contactoIndex');
Route::GET('/contactoindexdashboard', [ContactoController::class, 'indexDashboard'])->name('contactoIndexDB');
Route::POST('/contactostore', [ContactoController::class, 'store'])->name('contactoStore');
Route::GET('/contactochecked/{id}', [ContactoController::class, 'setChecked'])->name('contactoChecked');
Route::GET('/contactoactivo/{id}', [ContactoController::class, 'setActivo'])->name('contactoActivo');

//Rutas para el dashboard
Route::GET('/nichosdashboard', [DashboardController::class, 'countNichos'])->name('countNichos');
Route::GET('/huespedesdashboard', [DashboardController::class, 'countHuespedes'])->name('countHuespedes');
Route::GET('/contactodashboard', [DashboardController::class, 'countContacto'])->name('countContacto');