<?php

namespace Postbuffer\Posts\Providers;

use Illuminate\Support\ServiceProvider;

class PostsServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'posts');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'posts');

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
        $this->app->bind('postbuffer.posts', function ($app) {
            return $this->app->make('Postbuffer\Posts\Posts');
        });

        // Bind Post to repository
        $this->app->bind(
            'Postbuffer\Posts\Interfaces\PostRepositoryInterface',
            \Postbuffer\Posts\Repositories\Eloquent\PostRepository::class
        );
        // Bind Channel to repository
        $this->app->bind(
            'Postbuffer\Posts\Interfaces\ChannelRepositoryInterface',
            \Postbuffer\Posts\Repositories\Eloquent\ChannelRepository::class
        );

        $this->app->register(\Postbuffer\Posts\Providers\AuthServiceProvider::class);
        
        $this->app->register(\Postbuffer\Posts\Providers\RouteServiceProvider::class);
                
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['postbuffer.posts'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('postbuffer/posts.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/posts')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/posts')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
