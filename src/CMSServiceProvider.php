<?php

namespace VedianSOFT\Providers;

use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register your CMS services here
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/yourconfig.php' => config_path('yourconfig.php'),
        ], 'config');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../views', 'yourpackage');

        // Publish views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/yourpackage'),
        ], 'views');
    }
}
