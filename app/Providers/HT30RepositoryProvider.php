<?php

namespace App\Providers;

use App\Repositories\HT30\KeyRepository;
use App\Repositories\HT30\ObjectRepository;
use App\Repositories\HT30\ResultRepository;
use App\Repositories\Impl\HT30\KeyRepositoryImpl;
use App\Repositories\Impl\HT30\ObjectRepositoryImpl;
use App\Repositories\Impl\HT30\ResultRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class HT30RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ObjectRepository::class,
            ObjectRepositoryImpl::class
        );
        $this->app->singleton(
            KeyRepository::class,
            KeyRepositoryImpl::class
        );
        $this->app->singleton(
            ResultRepository::class,
            ResultRepositoryImpl::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
