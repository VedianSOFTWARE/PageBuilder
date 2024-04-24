<?php

namespace Vedian\PageBuilder\Support;

use Illuminate\Support\Facades\Route;

/**
 * Class RouteSupport
 * 
 * This class provides methods to build routes for the Vedian CMS page builder.
 */
class RouteSupport
{
    /**
     * The prefix for the admin routes.
     *
     * @var string
     */
    protected string $dashboardRoute = 'dashboard';

    /**
     * Get the route prefix for the admin routes.
     *
     * @return string The route prefix for the admin routes.
     */
    public function prefix(string $route)
    {
        return [
            'middleware' => static::middleware(),
            'prefix' => $route,
            'as' => "{$route}.",
        ];
    }

    /**
     * Get the routes for the admin dashboard.
     *
     * @return array The routes for the admin dashboard.
     */
    public function resource(string $name, $controller)
    {
        Route::resource($name, $controller);
    }

    /**
     * Build a route group.
     *
     * @param string $route The route prefix.
     * @param callable $callback The callback to execute.
     * @return void
     */
    public function dashboard($callback)
    {
        Route::group(
            static::prefix($this->dashboardRoute),
            $callback
        );
    }

    /**
     * Get the auth middleware.
     *
     * @return string The auth middleware.
     */
    public function getAuthMiddleware()
    {
        return config('pagebuilder.guard') ? config('pagebuilder.guard') : 'auth';
    }

    /**
     * Get the auth session middleware.
     *
     * @return string The auth session middleware.
     */
    public function getAuthSessionMiddleware()
    {
        return config('pagebuilder.auth_session', false) ? config('pagebuilder.auth_session') : null;
    }

    /**
     * Get the middleware for the routes.
     *
     * @return array The middleware for the routes.
     */
    public function middleware()
    {
        return array_values(array_filter([
            'web',
            static::getAuthMiddleware(),
            static::getAuthSessionMiddleware(),
        ]));
    }
}
