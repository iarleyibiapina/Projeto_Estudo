<?php

namespace App\Providers;

use App\Models\TaskModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // primeiro abastrata, depois concreta /
        // primeiro a esta implementando e depois a que é implementada
        $this->app->bind('App\Repositories\Interfaces\TaskRepositoryInterface', 'App\Repositories\TaskRepository');
        $this->app->bind('App\Repositories\TaskRepository', function () {
            return new TaskRepository(new TaskModel());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerMigrations();
        $this->registerDebugBar();
        Paginator::useBootstrapFive(); // Usar o bootstrap 5 no paginador
    }

    public function registerMigrations(): void
    {
        $migrationsPath = database_path('migrations');
        $directories = glob($migrationsPath . '/*' , GLOB_ONLYDIR);
        $paths = array_merge([$migrationsPath], $directories);
        $this->loadMigrationsFrom($paths);
    }

    public function registerDebugBar(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }
}
