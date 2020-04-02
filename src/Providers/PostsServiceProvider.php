<?php

namespace Posts\Posts\Providers;

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
        $this->mergeConfig();
        $this->registerPosts();
        $this->registerFacade();
        $this->registerBindings();
        //$this->registerCommands();
    }


    /**
     * Register the application bindings.
     *
     * @return void
     */
    protected function registerPosts()
    {
        $this->app->bind('posts', function($app) {
            return new Posts($app);
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
            $loader->alias('Posts', 'Lavalite\Posts\Facades\Posts');
        });
    }

    /**
     * Register bindings for the provider.
     *
     * @return void
     */
    public function registerBindings() {
        // Bind facade
        $this->app->bind('posts.posts', function ($app) {
            return $this->app->make('Posts\Posts\Posts');
        });

        // Bind Post to repository
        $this->app->bind(
            'Posts\Posts\Interfaces\PostRepositoryInterface',
            \Posts\Posts\Repositories\Eloquent\PostRepository::class
        );
        // Bind Channel to repository
        $this->app->bind(
            'Posts\Posts\Interfaces\ChannelRepositoryInterface',
            \Posts\Posts\Repositories\Eloquent\ChannelRepository::class
        );

        $this->app->register(\Posts\Posts\Providers\AuthServiceProvider::class);
                $this->app->register(\Posts\Posts\Providers\EventServiceProvider::class);
        
        $this->app->register(\Posts\Posts\Providers\RouteServiceProvider::class);
                // $this->app->register(\Posts\Posts\Providers\WorkflowServiceProvider::class);
            }

    /**
     * Merges user's and posts's configs.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/config.php', 'posts.posts'
        );
    }

    /**
     * Register scaffolding command
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\MakePosts::class,
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
        return ['posts.posts'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../config/config.php' => config_path('posts/posts.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../resources/views' => base_path('resources/views/vendor/posts')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/posts')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
