<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

use App\Http\Controllers\RemoveRoleFromUserController;
use App\Http\Controllers\RevokePermissionFromRoleController;
use App\Http\Controllers\RevokePermissionFromUserController;
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Person\PersonController;
use App\Http\Controllers\Store\StoreController;

use App\Http\Controllers\Alert\AlertController;


use App\Http\Controllers\Store\StoreLocationController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactiondetailController;

use App\Http\Controllers\Support\SupportController;


use App\Http\Controllers\Platform\PlatformStoreController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Atc\AtcController;

use App\Http\Controllers\Contabilidad\ContabilidadController;
use App\Http\Controllers\King\KingController;
use App\Http\Controllers\Platform\PlatformController;
use App\Http\Controllers\Utility\UtilityController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/****************************************************************************************************************/
/***************************************  Detalle  Partners   ***************************************************/
/****************************************************************************************************************/

Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');

/****************************************************************************************************************/
/***************************************  Detalle  Partners   ***************************************************/
/****************************************************************************************************************/

Route::get('/alerts', [AlertController::class, 'index'])->name('alerts.index');
Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
Route::put('/alerts/{id}', [AlertController::class, 'update'])->name('alerts.update');
Route::delete('/alerts/{id}', [AlertController::class, 'destroy'])->name('alerts.destroy');
/****************************************************************************************************************/
/***************************************  Detalle  Clientes   ***************************************************/
/****************************************************************************************************************/

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

/*****************************************************************************************************************/
/******************************** Interesados (Personas)**********************************************************/
/*****************************************************************************************************************/

Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
Route::put('/persons/{id}', [PersonController::class, 'update'])->name('persons.update');
Route::delete('/persons/{id}', [PersonController::class, 'destroy'])->name('persons.destroy');

/****************************************************************************************************************/
/******************************* Sedes controler ***********************************************************/
/****************************************************************************************************************/

Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.index');
Route::put('/stores/{id}', [StoreController::class, 'update'])->name('stores.update');
Route::delete('/stores/{id}', [StoreController::class, 'destroy'])->name('stores.destroy');

/****************************************************************************************************************/
/****************************** Transacciones Controller **********************************************************/
/****************************************************************************************************************/

Route::get('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

/****************************************************************************************************************/
/************************************ Deatlle Transacciones ****************************************************/
/****************************************************************************************************************/

Route::get('/transactiondetail', [TransactiondetailController::class, 'index'])->name('transactiondetail.index');
Route::post('/transactiondetail', [TransactiondetailController::class, 'store'])->name('transactiondetail.store');
Route::put('/transactiondetail/{id}', [TransactiondetailController::class, 'update'])->name('transactiondetail.update');
Route::delete('/transactiondetail/{id}', [TransactiondetailController::class, 'destroy'])->name('transactiondetail.destroy');

/****************************************************************************************************************/
/********************************* Utilidades **************************************************************/
/****************************************************************************************************************/
Route::get('/utility', [UtilityController::class, 'index'])->name('utility.index');
Route::post('/utility', [UtilityController::class, 'store'])->name('utility.store');
Route::put('/utility/{id}', [UtilityController::class, 'update'])->name('utility.update');
Route::delete('/utility/{id}', [UtilityController::class, 'destroy'])->name('utility.destroy');

/****************************************************************************************************************/
/**************************************** Ubicaion Sede ***********************************************************/
/****************************************************************************************************************/

Route::get('/locationlocal', [StoreLocationController::class, 'index'])->name('locationlocal.destroy');
Route::post('/locationlocal', [StoreLocationController::class, 'store'])->name('locationlocal.destroy');
Route::put('/locationlocal/{id}', [StoreLocationController::class, 'update'])->name('locationlocal.destroy');
Route::delete('/locationlocal/{id}', [StoreLocationController::class, 'destroy'])->name('locationlocal.destroy');

/****************************************************************************************************************/
/*****************************  Plataformas Sedes Tabla  ******************************************************/
/****************************************************************************************************************/

Route::get('/platformstore', [PlatformStoreController::class, 'index'])->name('platformstore.index');
Route::post('/platformstore', [PlatformStoreController::class, 'store'])->name('platformstore.store');
Route::put('/platformstore/{id}', [PlatformStoreController::class, 'update'])->name('platformstore.update');
Route::delete('/platformstore/{id}', [PlatformStoreController::class, 'destroy'])->name('platformstore.destroy');

/****************************************************************************************************************/
/*********************************** Plataformas tabla ************************************************************/
/****************************************************************************************************************/



Route::get('/platforms', [PlatformController::class, 'index'])->name('platforms.index');
Route::post('/platforms', [PlatformController::class, 'store'])->name('platforms.store');
Route::put('/platforms/{id}', [PlatformController::class, 'update'])->name('platforms.update');
Route::delete('/platforms/{id}', [PlatformController::class, 'destroy'])->name('platforms.destroy');


/****************************************************************************************************************/
/*********************************** Tabla cLientes ************************************************************/
/****************************************************************************************************************/

Route::get('/platforms', [PlatformController::class, 'index'])->name('platforms.index');
Route::post('/platforms', [PlatformController::class, 'store'])->name('platforms.store');
Route::put('/platforms/{id}', [PlatformController::class, 'update'])->name('platforms.update');
Route::delete('/platforms/{id}', [PlatformController::class, 'destroy'])->name('platforms.destroy');

/****************************************************************************************************************/
/***************************** King tabla (admin modulo todods + usuarios,roles,permisos)  **********************/
/****************************************************************************************************************/



//Route::delete('/king', [KingController::class, 'index'])->name('king.index');
// Route::delete('/king', [KingController::class, 'store'])->name('king.store');
// Route::delete('/king', [KingController::class, 'update'])->name('king.update');
// Route::delete('/king', [KingController::class, 'destroy'])->name('king.destroy');

/****************************************************************************************************************/
/**********************************Contabilidad*******************************************************/
/****************************************************************************************************************/
// Route::delete('/contabilidad', [ContabilidadController::class, 'index'])->name('contabilidad.index');
// Route::delete('/contabilidad', [ContabilidadController::class, 'store'])->name('contabilidad.store');
// Route::delete('/contabilidad', [ContabilidadController::class, 'update'])->name('contabilidad.update');
// Route::delete('/contabilidad', [ContabilidadController::class, 'destroy'])->name('contabilidad.destroy');

/****************************************************************************************************************/
/********************************** Dashboard pagina de Inicio **************************************************/
/****************************************************************************************************************/

//Route::delete('/dash', [DashboardController::class, 'index'])->name('dash.index');
// Route::delete('/dash', [DashboardController::class, 'store'])->name('dash.store');
// Route::delete('/dash', [DashboardController::class, 'update'])->name('dash.update');
// Route::delete('/dash', [DashboardController::class, 'destroy'])->name('dash.destroy');

    Route::get('/supadmin', [KingController::class, 'index'])->name('king.index');
    Route::get('/soporte', [SupportController::class, 'index'])->name('soporte.index');
    Route::get('/contabilidad', [ContabilidadController::class, 'index'])->name('contabilidad.index');
    Route::get('/dash', [DashboardController::class, 'index'])->name('reportes.index');
    Route::get('/atc', [AtcController::class, 'index'])->name('atc.index');

         // Route::get('/atc', [SoporteController::class, 'index'])->name('atc.index');


/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::resource('/posts', PostController::class);

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::delete('/roles/{role}/permissions/{permission}', RevokePermissionFromRoleController::class)
    ->name('roles.permissions.destroy');
Route::delete('/users/{user}/permissions/{permission}', RevokePermissionFromUserController::class)
    ->name('users.permissions.destroy');
Route::delete('/users/{user}/roles/{role}', RemoveRoleFromUserController::class)
    ->name('users.roles.destroy');

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
    //     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // });

    // Route::middleware(RoleMiddleware::class . ':atencion')->group(function () {
    //     Route::get('/atc', [AtcController::class, 'index'])->name('atc.index');
    // });

    // Route::middleware(RoleMiddleware::class . ':contabilidad')->group(function () {
    //     Route::get('/contabilidad', [ContabilidadController::class, 'index'])->name('contabilidad.index');
    // });

    // Route::middleware(RoleMiddleware::class . ':soporte')->group(function () {
    //     Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte.index');
    // });

});
/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/****************************************************************************************************************/
/******************************************** Roles *************************************************************/
/****************************************************************************************************************/

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// });


/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

require __DIR__ . '/auth.php';

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/

        // Route::get('/transaction', [TransactionController::class, 'index'])->name('transactions.index');
        // Route::get('/transactiondetail', [TransactionController::class, 'index'])->name('transactionsdetail.index');
        // Route::get('/platform', [PlatformController::class, 'index'])->name('platforms.index');
        // Route::get('/utility', [UtilityController::class, 'index'])->name('utilitys.index');
        // Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        // Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
        // Route::put('/persons/{cliepersonsnte}', [PersonController::class, 'update'])->name('persons.update');
        // Route::delete('/persons/{persons}', [PersonController::class, 'destroy'])->name('persons.destroy');

/****************************************************************************************************************/
/****************************************************************************************************************/
/****************************************************************************************************************/
