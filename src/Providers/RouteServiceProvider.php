<?php

namespace Channels\Postbuffer\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Channels\Postbuffer\Models\Postbuffer;
use Request;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Channels\Postbuffer\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/postbuffer/post/*')) {
            Route::bind('post', function ($post) {
                $postrepo = $this->app->make('Channels\Postbuffer\Interfaces\PostRepositoryInterface');
                return $postrepo->findorNew($post);
            });
        }

        if (Request::is('*/postbuffer/channel/*')) {
            Route::bind('channel', function ($channel) {
                $channelrepo = $this->app->make('Channels\Postbuffer\Interfaces\ChannelRepositoryInterface');
                return $channelrepo->findorNew($channel);
            });
        }

    }

    /**
     * Define the routes for the package.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the package.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {   
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the package.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router) {
            require (__DIR__ . '/../../routes/api.php');
        });
    }

}
