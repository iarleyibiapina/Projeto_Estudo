<?php

use App\Http\Controllers\ExemploController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Esta rota foi definida adicionando um novo grupo de rotas na função dentro de:
// App\Providers\RouteServiceProvider 

// Rota simples trazendo função simples
Route::get('/rota-arquivo-separado', function () {
    echo "ola";
    return;
});

// Definindo rota: (controller / metodo do controller)
Route::get('/', [ExemploController::class, 'exemploMetodoDois'])->name('home');

// Definindo outro grupo de controller, onde tem como um controller para o grupo inteiro de rotas
Route::controller(ExemploController::class)->group(function () {
    Route::get('/exemplo', 'exemploMetodoUm')->name('exemplo-grupo.exemploUm');
    Route::post('/exemplo', 'exemploMetodoDois')->name('exemplo-grupo.exemploDois');
});

// Prefix / para separar mais rotas e evitar muitos código, este prefixo é uma forma de definir um padrao
// para toda rota criado dentro dele, ex.: toda rota criada será: 'exemploURL' e depois na rota sera definido a rota completa
// ficando: 'exemploURL/sufixoRotaUrl'
// este 'as' tambem cumpre o mesmo papel, evitando muito codigo repetido e definira um nome automatico para cada rota
// agora sendo chamada pelo controller desta forma: 'filmes.exemploMetodoController'
Route::prefix('exemploURL')->as('filmes.')->group(function () {
    Route::get('/sufixoRotaUrl', [ExemploController::class, 'exemploMetodoTres'])->name('exemploMetodoController');
});

// Rota com middleware / um 'portao' de acesso, pode ser modificado para definir um acesso personalizado
// ou para definir o nivel de acesso do usuario / se usuario logado
// group / agrupa outras rotas...
// name / dá um nome a rota, onde pode ser chamado pelo controller via 'route()'
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// outra forma de middleware / se middleware falhar, retorna por padrao a rota 'login'
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
