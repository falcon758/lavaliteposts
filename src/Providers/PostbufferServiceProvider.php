<?php

namespace Channels\Postbuffer\Providers;

use Illuminate\Support\ServiceProvider;

class PostbufferServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'postbuffer');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'postbuffer');

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
        $this->registerPostbuffer();
        $this->registerFacade();
        $this->registerBindings();
        //$this->registerCommands();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    protected function registerPostbuffer()
    {
        $this->app->bind('postbuffer', function($app) {
            return new Postbuffer($app);
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
            $loader->alias('Postbuffer', 'Lavalite\Postbuffer\Facades\Postbuffer');
        });
    }

    /**
     * Register bindings for the provider.
     *
     * @return void
     */
    public function registerBindings() {
        // Bind facade
        $this->app->bind('channels.postbuffer', function ($app) {
            return $this->app->make('Channels\Postbuffer\Postbuffer');
        });

        // Bind Post to repository
        $this->app->bind(
            'Channels\Postbuffer\Interfaces\PostRepositoryInterface',
            \Channels\Postbuffer\Repositories\Eloquent\PostRepository::class
        );
        // Bind Channel to repository
        $this->app->bind(
            'Channels\Postbuffer\Interfaces\ChannelRepositoryInterface',
            \Channels\Postbuffer\Repositories\Eloquent\ChannelRepository::class
        );

        $this->app->register(\Channels\Postbuffer\Providers\AuthServiceProvider::class);
                $this->app->register(\Channels\Postbuffer\Providers\EventServiceProvider::class);
        
        $this->app->register(\Channels\Postbuffer\Providers\RouteServiceProvider::class);
                // $this->app->register(\Channels\Postbuffer\Providers\WorkflowServiceProvider::class);
            }

    /**
     * Merges user's and postbuffer's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'channels.postbuffer'
        );
    }

    /**
     * Register scaffolding command
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\MakePostbuffer::class,
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
        return ['channels.postbuffer'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('channels/postbuffer.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/postbuffer')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/postbuffer')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
