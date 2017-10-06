<?php

namespace Charis\Providers;

use Charis\Http\ViewComposers\MenuComposer;
use Illuminate\Support\ServiceProvider;
use Charis\Repositories\Category\CommentRepository;
use Charis\Repositories\Category\ICategoryRepository;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('nav', MenuComposer::class);
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
            CommentRepository::class
        );

    }
}
