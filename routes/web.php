<?php

use App\Http\Controllers\AnnonceController;
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
//Route pour la page d'accueil
Route::get('/', [AnnonceController::class, 'browse'])->name('browse');

//Je préfixe les routes pour qu'elles démarrent toutes par annonce/
Route::prefix('annonce/')->group(function(){
    Route::get('/read/{id}', [AnnonceController::class, 'read'])->name('read');
    Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('create');
    Route::post('/annonce/create', [AnnonceController::class, 'add'])->name('add');
    Route::get('/annonce/edit/{id}', [AnnonceController::class, 'edit'])->name('edit');
    Route::post('/annonce/edit/{id}', [AnnonceController::class, 'update'])->name('update');
    Route::get('/annonce/delete/{id}', [AnnonceController::class, 'delete'])->name('delete');
});

