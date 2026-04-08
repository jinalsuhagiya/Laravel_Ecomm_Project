<?php

namespace Jinal\Catalog\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $router->aliasMiddleware('admin', BouncerMiddleware::class);

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->publishes([
            __DIR__.'/../config/category.php' => config_path('category.php'),
            // __DIR__.'/../lang' => $this->app->langPath('vendor/courier'),
             __DIR__.'/../resources/views' => resource_path('views/vendor/catalog'),
        ]);

         $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'catalog');
    }

}
