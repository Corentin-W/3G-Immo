<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Redirect;
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
//Home page route
Route::get('/', [AnnonceController::class, 'browse'])->name('browse');

//Routes for the CRUD
Route::prefix('annonce/')->group(function(){
    Route::get('read/{id}', [AnnonceController::class, 'read'])->name('read');
    Route::get('create', [AnnonceController::class, 'create'])->name('create');
    Route::post('create', [AnnonceController::class, 'add'])->name('add');
    Route::get('edit/{id}', [AnnonceController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [AnnonceController::class, 'update'])->name('update');
    Route::get('delete/{id}', [AnnonceController::class, 'delete'])->name('delete');
});

//Routes for the home page order
Route::prefix('order/')->group(function(){
    Route::get('date/{order}', [OrderController::class, 'orderDate'])->name('order-by-date');
    Route::get('price/{order}', [OrderController::class, 'orderPrice'])->name('order-by-price');
    Route::get('surface/{order}', [OrderController::class, 'orderSurface'])->name('order-by-surface');
    Route::get('rooms/{order}', [OrderController::class, 'orderRooms'])->name('order-by-rooms');
});

//Route for the agent's
Route::prefix('agent/')->group(function(){
    Route::get('detail/{id}', [AgentController::class, 'agentDetail'])->name('agent-detail');
    Route::get('list', [AgentController::class, 'agentList'])->name('agents-list');
});

// Routes for the authentification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');

require __DIR__.'/auth.php';


