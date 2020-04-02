<?php

namespace Postbuffer\Channels\Providers;

use Illuminate\Support\ServiceProvider;

class ChannelsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'channels');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'channels');

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
        $this->mergeConfig();
        $this->registerChannels();
        $this->registerFacade();
        $this->registerBindings();
        //$this->registerCommands();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    protected function registerChannels()
    {
        $this->app->bind('channels', function($app) {
            return new Channels($app);
        });
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade() {
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Channels', 'Lavalite\Channels\Facades\Channels');
        });
    }

    /**
     * Register bindings for the provider.
     *
     * @return void
     */
    public function registerBindings() {
        // Bind facade
        $this->app->bind('postbuffer.channels', function ($app) {
            return $this->app->make('Postbuffer\Channels\Channels');
        });

        // Bind Post to repository
        $this->app->bind(
            'Postbuffer\Channels\Interfaces\PostRepositoryInterface',
            \Postbuffer\Channels\Repositories\Eloquent\PostRepository::class
        );
        // Bind Channel to repository
        $this->app->bind(
            'Postbuffer\Channels\Interfaces\ChannelRepositoryInterface',
            \Postbuffer\Channels\Repositories\Eloquent\ChannelRepository::class
        );

        $this->app->register(\Postbuffer\Channels\Providers\AuthServiceProvider::class);
                $this->app->register(\Postbuffer\Channels\Providers\EventServiceProvider::class);
        
        $this->app->register(\Postbuffer\Channels\Providers\RouteServiceProvider::class);
                // $this->app->register(\Postbuffer\Channels\Providers\WorkflowServiceProvider::class);
            }

    /**
     * Merges user's and channels's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'postbuffer.channels'
        );
    }

    /**
     * Register scaffolding command
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\MakeChannels::class,
            ]);
        }
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['postbuffer.channels'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('postbuffer/channels.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/channels')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/channels')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
