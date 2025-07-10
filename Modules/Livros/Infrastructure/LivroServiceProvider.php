<?php

namespace Modules\Livros\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Modules\Livros\Application\LivroService;
use Modules\Livros\Domain\LivroServiceInterface;
use Modules\Livros\Domain\LivroRepositoryInterface;

class LivroServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registra a implementação do repositório para a interface
        $this->app->bind(
            LivroRepositoryInterface::class,
            LivroRepository::class
        );
        // Registra a implementação da service para a interface
        $this->app->bind(
            LivroServiceInterface::class,
            LivroService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Carrega as rotas específicas do módulo Modules/Livros/UI/routes/web.php
        $this->loadRoutesFrom(__DIR__ .  '/../UI/routes/web.php');

        // Carrega as views específicas do módulo
        $this->loadViewsFrom(__DIR__ . '/../UI/resources/views', 'livrox'); // 'livros' é o namespace das views
    }
}
