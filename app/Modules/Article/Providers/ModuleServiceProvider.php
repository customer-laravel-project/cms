<?php

namespace App\Modules\Article\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('article', 'Resources/Lang', 'app'), 'article');
        $this->loadViewsFrom(module_path('article', 'Resources/Views', 'app'), 'article');
        $this->loadMigrationsFrom(module_path('article', 'Database/Migrations', 'app'), 'article');
        $this->loadConfigsFrom(module_path('article', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('article', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
