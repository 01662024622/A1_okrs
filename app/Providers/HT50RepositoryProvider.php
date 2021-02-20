<?php

namespace App\Providers;

use App\Repositories\HT50\InforCustomerSurveyRepository;
use App\Repositories\Impl\HT50\InforCustomerSurveyRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class HT50RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            InforCustomerSurveyRepository::class,
            InforCustomerSurveyRepositoryImpl::class
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
