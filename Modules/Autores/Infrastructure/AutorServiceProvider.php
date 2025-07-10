<?php

namespace Modules\Autores\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Modules\Autores\Application\AutorService;
use Modules\Autores\Domain\AutorRepositoryInterface;
use Modules\Autores\Domain\AutorServiceInterface;

class AutorServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(AutorRepositoryInterface::class, AutorRepository::class);
        $this->app->bind(AutorServiceInterface::class, AutorService::class);
    }

    public function boot(): void {}
}
