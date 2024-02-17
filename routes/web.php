<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DtoController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Filme\FilmeController;


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

Route::get('/', function () {
    return view('index');
})->name('index');

// rota definida 'temporaria' pois se não passar em middleware retorna para rota de nome 'login'
Route::get('/rota-redefinida', function () {
    return view('index');
})->name('login');

Route::middleware(LoginMiddleware::class)->controller(LoginController::class)->group(function () {
    // Route::get('/login', 'index')->name('login.index');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::get('/logado', [FilmeController::class, 'index'])->name('logado.index');

    // rotas filmes
    Route::prefix('logado/filmes')->as('filmes.')->group(function () {
        Route::get('/', function () {
            return view('Filmes.index');
        })->name('index');
        Route::get('/create', function () {
            return view("Filmes.index");
        })->name('index');
        Route::post('/store', [FilmeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FilmeController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [FilmeController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [FilmeController::class, 'destroy'])->name('destroy');
    });
});


Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});

// AJAX
Route::get('/ajax', function () {
    return view("Site.ajax.ajax");
});
Route::post('/apax-post', [AjaxController::class, "request"])->name('apax-post');

// DTO
// Route::post('/dto', [DtoController::class, "create"]);
