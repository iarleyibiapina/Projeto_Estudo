<?php

use App\Http\Controllers\Filme\FilmeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [HomeController::class, 'index'])->name('index');


Route::middleware(LoginMiddleware::class)->controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::get('/logado', [FilmeController::class, 'index'])->name('logado.index'); 

    // rotas filmes

    Route::prefix('logado/filmes')->as('filmes.')->group(function(){
        Route::get('/', function(){
            return view('Filmes.index');
        })->name('index');
        Route::get('/create', function(){ return view("Filmes.index");})->name('index');
        Route::get('/store', [FilmeController::class, 'store'])->name('store');
        Route::get('/show/{id}', [FilmeController::class, 'show'])->name('show');
    });
});
Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});
