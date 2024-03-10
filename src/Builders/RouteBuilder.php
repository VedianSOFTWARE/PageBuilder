
<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Support\Facades\Route;

/**
 * Class RouteBuilder
 * 
 * This class provides static methods to build routes for the Vedian CMS page builder.
 */
class RouteBuilder
{

    /**
     * The prefix for the admin routes.
     *
     * @var string
     */
    protected static string $dashboardRoute = 'dashboard';

    /**
     * Get the route prefix for the admin routes.
     *
     * @return string The route prefix for the admin routes.
     */
    public static function prefix(string $route)
    {
        return [
            'prefix' => $route,
            'as' => "{$route}.",
        ];
    }

    /**
     * Get the routes for the admin dashboard.
     *
     * @return array The routes for the admin dashboard.
     */
    public static function resource(string $name, $controller)
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
    public static function dashboard($callback)
    {
        Route::group(
            static::prefix(static::$dashboardRoute),
            $callback
        );
    }
}
