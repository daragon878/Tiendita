<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniaController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredCompanyController;
use App\Http\Controllers\Auth\RegisteredPerfilController;



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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('Get-Compania', [AuthenticatedSessionController::class, 'GetCompania'])
->name('Compania');

Route::get('Get-perfil', [AuthenticatedSessionController::class, 'Getperfil'])
->name('perfil');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

Route::get('RegistrarUsuario', [RegisteredUserController::class, 'createUser'])
->name('RegistrarUsuario');

Route::post('registerV', [RegisteredUserController::class, 'store'])
->name('registerV');

Route::get('RegistroCompania', 
    [RegisteredCompanyController::class, 'Compania'])
->name('RegistroCompania');

Route::post('registerCompany', [RegisteredCompanyController::class, 'store'])
->name('registerCompany');


Route::get('registerPerfil', 
    [RegisteredPerfilController::class, 'perfil'])
->name('registerPerfil');

Route::post('registerPerfilSave', [RegisteredPerfilController::class, 'store'])
->name('registerPerfilSave');


Route::get('getExample', 
    [RegisteredPerfilController::class, 'getDataTable'])
->name('datatables.data');


require __DIR__.'/auth.php';
