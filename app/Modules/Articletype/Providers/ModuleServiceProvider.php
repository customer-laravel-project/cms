<?php

namespace App\Modules\Articletype\Providers;

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
        $this->loadTranslationsFrom(module_path('articletype', 'Resources/Lang', 'app'), 'articletype');
        $this->loadViewsFrom(module_path('articletype', 'Resources/Views', 'app'), 'articletype');
        $this->loadMigrationsFrom(module_path('articletype', 'Database/Migrations', 'app'), 'articletype');
        $this->loadConfigsFrom(module_path('articletype', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('articletype', 'Database/Factories', 'app'));
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
