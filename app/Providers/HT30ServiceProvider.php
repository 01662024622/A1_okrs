<?php

namespace App\Providers;

use App\Services\HT30\KeyService;
use App\Services\HT30\ObjectService;
use App\Services\HT30\ObjectUserService;
use App\Services\HT30\ResultService;
use App\Services\Impl\HT30\KeyServiceImpl;
use App\Services\Impl\HT30\ObjectServiceImpl;
use App\Services\Impl\HT30\ObjectUserServiceImpl;
use App\Services\Impl\HT30\ResultServiceImpl;
use Illuminate\Support\ServiceProvider;

class HT30ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            KeyService::class,
            KeyServiceImpl::class
        );
        $this->app->singleton(
            ObjectService::class,
            ObjectServiceImpl::class
        );
        $this->app->singleton(
            ResultService::class,
            ResultServiceImpl::class
        );
        $this->app->singleton(
            ObjectUserService::class,
            ObjectUserServiceImpl::class
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
