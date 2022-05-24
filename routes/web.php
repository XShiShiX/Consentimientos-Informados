<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsentController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\ClientController;
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

// Example Routes
Route::view('/', 'auth.login');

//Rutas para la autenticacion
Route::get('/login', [SessionsController::class, 'login'])->name('login');
//Route::get('/registration', [SessionsController::class, 'registration']);
//Route::post('/register-user', [SessionsController::class, 'registerUser'])->name('register-user');
Route::post('login-user', [SessionsController::class, 'loginUser'])->name('login-user');

//Rutas para el CRUD de clientes (Sin Resource)
Route::get('/client', [ClientController::class, 'index'])->name('client')->middleware('auth.check');

Route::get('/client-create', [ClientController::class, 'create'])->name('client-create')->middleware('auth.check');
Route::post('/client-create', [ClientController::class, 'create'])->name('client-create1')->middleware('auth.check');
Route::post('/client-create', [ClientController::class, 'store'])->name('client-create1');

Route::get('/client-edit/{id}', [ClientController::class, 'edit'])->name('client-edit')->middleware('auth.check');
Route::post('/client-edit/{id}', [ClientController::class, 'edit'])->name('client-edit1')->middleware('auth.check');
Route::put('/client-edit/{id}', [ClientController::class, 'update']);

Route::get('/client-show/{id}', [ClientController::class, 'show'])->name('client-show')->middleware('auth.check');
Route::post('/client-show/{id}', [ClientController::class, 'show'])->name('client-show1')->middleware('auth.check');

Route::delete('/client-destroy/{id}', [ClientController::class, 'destroy'])->name('client-delete');

Route::get('/client-destroy/{id}', [ClientController::class, 'eliminar'])->name('client-destroy')->middleware('auth.check');
Route::post('/client-destroy/{id}', [ClientController::class, 'eliminar'])->name('client-destroy1')->middleware('auth.check');

Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('user-delete');


//Rutas para el CRUD admin (con resource)
Route::resource('admin', AdminController::class)->middleware('auth.admin');
Route::put('/admin-edit/{id}', [AdminController::class, 'update']);

//Rutas para el CRUD consentimientos (con resource)
Route::resource('consent', ConsentController::class)->middleware('auth.check');
Route::put('/consent-edit/{id}', [ConsentController::class, 'update']);
Route::get('/consent-destroy/{id}', [ConsentController::class, 'eliminar'])->name('consent-destroy')->middleware('auth.check');
Route::post('/consent-destroy/{id}', [ConsentController::class, 'eliminar'])->name('consent-destroy1')->middleware('auth.check');
Route::delete('/consent/{id}', [ConsentController::class, 'destroy'])->name('consent-delete');

//Rutas para el CRUD tratamientos (con resource)
Route::resource('treatment', TreatmentController::class)->middleware('auth.check');
Route::put('/treatment-edit/{id}', [TreatmentController::class, 'update']);
Route::get('/treatment-show/{id}', [TreatmentController::class, 'show'])->name('treatment-show')->middleware('auth.check');

//Rutas para cambiar pass
Route::get('pass', [PassController::class, 'change'])->middleware('auth.check');
Route::put('pass-edit', [PassController::class, 'update']);

//Ruta para PDF
Route::get('/consent-pdf/{id}', [ConsentController::class, 'pdf'])->name('consent-pdf');
Route::post('/consent-pdf/{id}', [ConsentController::class, 'pdf'])->name('consent-pdf1');

//Ruta para logout
Route::get('/logout', [LogoutController::class, 'logout']);
