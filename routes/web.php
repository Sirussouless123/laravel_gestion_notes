<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Filiere\FiliereController;
use App\Http\Controllers\Matiere\MatiereController;
use App\Http\Controllers\AnneeAcademique\AnneeAcademiqueController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Filiere_matiere\Filiere_matiereController;

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

Route::prefix('admin')->middleware(['auth','isAdmin'])->name('admin.')->group( function(){

    Route::resource('filiere',FiliereController::class)->except('show');
    Route::resource('matiere',MatiereController::class)->except('show');
    Route::resource('annee',AnneeAcademiqueController::class)->except('show');
    Route::resource('filiere_matiere',Filiere_matiereController::class)->except('show');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'user']);

