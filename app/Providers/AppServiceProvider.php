<?php

namespace Charis\Providers;

use Illuminate\Support\ServiceProvider;
use Charis\Repositories\Category\CategoryRepository;
use Charis\Repositories\Category\ICategoryRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            ICategoryRepository::class,
            CategoryRepository::class
        );

    }
}
