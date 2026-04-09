<?php

namespace Jinal\Catalog\Providers;

use Illuminate\Support\ServiceProvider;
use Jinal\Catalog\Repositories\CategoryRepositoryInterface;
use Jinal\Catalog\Repositories\CategoryRepository;

class CatalogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // include __DIR__.'/../Http/helpers.php';
        //  $this->mergeConfigFrom(
        //     __DIR__.'/../config/category.php', 'category'
        // );
        $this->app->bind(
                CategoryRepositoryInterface::class,
                CategoryRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'catalog');

        $this->publishes([
            __DIR__.'/../config/category.php' => config_path('category.php'),
            // __DIR__.'/../lang' => $this->app->langPath('vendor/courier'),
             __DIR__.'/../resources/views' => resource_path('views/vendor/catalog'),
        ]);

    }

}
