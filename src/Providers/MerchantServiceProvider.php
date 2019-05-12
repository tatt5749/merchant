<?php

namespace Merchant\Merchant\Providers;

use Illuminate\Support\ServiceProvider;

class MerchantServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'merchant');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'merchant');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Call pblish redources function
        $this->publishResources();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('merchant.merchant', function ($app) {
            return $this->app->make('Merchant\Merchant\Merchant');
        });

                // Bind Merchant to repository
        $this->app->bind(
            'Merchant\Merchant\Interfaces\MerchantRepositoryInterface',
            \Merchant\Merchant\Repositories\Eloquent\MerchantRepository::class
        );

        $this->app->register(\Merchant\Merchant\Providers\AuthServiceProvider::class);
        
        $this->app->register(\Merchant\Merchant\Providers\RouteServiceProvider::class);
                
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['merchant.merchant'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('merchant/merchant.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/merchant')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/merchant')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
