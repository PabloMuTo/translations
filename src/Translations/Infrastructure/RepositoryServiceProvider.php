<?php

namespace Src\Translations\Infrastructure;


use Illuminate\Support\ServiceProvider;
use Src\Translations\Domain\Contracts\GroupRepositoryInterface;
use Src\Translations\Domain\Contracts\LocaleRepositoryInterface;
use Src\Translations\Infrastructure\Repositories\GroupApiRepository;
use Src\Translations\Infrastructure\Repositories\LocaleApiRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LocaleRepositoryInterface::class,
            LocaleApiRepository::class,
        );

        $this->app->bind(
            GroupRepositoryInterface::class,
            GroupApiRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
