<?php

namespace Postbuffer\Posts\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Postbuffer\Posts\Models\Posts;
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
    protected $namespace = 'Postbuffer\Posts\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if (Request::is('*/posts/post/*')) {
            Route::bind('post', function ($post) {
                $postrepo = $this->app->make('Postbuffer\Posts\Interfaces\PostRepositoryInterface');
                return $postrepo->findorNew($post);
            });
        }

        if (Request::is('*/posts/channel/*')) {
            Route::bind('channel', function ($channel) {
                $channelrepo = $this->app->make('Postbuffer\Posts\Interfaces\ChannelRepositoryInterface');
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
        if (request()->segment(1) == 'api' || request()->segment(2) == 'api') {
            return;
        }
        
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
            'prefix'     => trans_setlocale(),
        ], function ($router) {
            require (__DIR__ . '/../../routes/web.php');
        });
    }

}