<?php

namespace App\Providers;

use App\Repositories\AssuntoRepository;
use App\Repositories\AssuntoRepositoryInterface;
use App\Repositories\AutorRepository;
use App\Repositories\AutorRepositoryInterface;
use App\Repositories\LivroRepository;
use App\Repositories\LivroRepositoryInterface;
use App\Services\AssuntoService;
use App\Services\AssuntoServiceInterface;
use App\Services\AutorService;
use App\Services\AutorServiceInterface;
use App\Services\LivroService;
use App\Services\LivroServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LivroRepositoryInterface::class, LivroRepository::class);
        $this->app->bind(LivroServiceInterface::class, LivroService::class);
        
        $this->app->bind(AutorRepositoryInterface::class, AutorRepository::class);
        $this->app->bind(AutorServiceInterface::class, AutorService::class);

        $this->app->bind(AssuntoRepositoryInterface::class, AssuntoRepository::class);
        $this->app->bind(AssuntoServiceInterface::class, AssuntoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
