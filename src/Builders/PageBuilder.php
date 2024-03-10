<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Support\Facades\Route;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 */
class PageBuilder
{
    /**
     * The prefix for the admin routes.
     *
     * @var string
     */
    public static $dashboardRoute = 'dashboard';

    /**
     * The fully qualified class name of the user model.
     *
     * @var string
     */
    public static $userModel = 'App\\Models\\User';

    /**
     * The fully qualified class name of the page model.
     *
     * @var string
     */
    public static $pageModel = 'Vedian\\PageBuilder\\Models\\Page';

    /**
     * The fully qualified class name of the row model.
     *
     * @var string
     */
    public static $rowModel = 'Vedian\\PageBuilder\\Models\\Row';

    /**
     * The fully qualified class name of the column model.
     *
     * @var string
     */
    public static $columnModel = 'Vedian\\PageBuilder\\Models\\Column';

    /**
     * Get the user model.
     *
     * @return string The fully qualified class name of the user model.
     */
    public static function user()
    {
        return static::$userModel;
    }

    /**
     * Get the page model.
     *
     * @return string The fully qualified class name of the page model.
     */
    public static function page()
    {
        return static::$pageModel;
    }

    /**
     * Get the row model.
     *
     * @return string The fully qualified class name of the row model.
     */
    public static function row()
    {
        return static::$rowModel;
    }

    /**
     * Get the column model.
     *
     * @return string The fully qualified class name of the column model.
     */
    public static function column()
    {
        return static::$columnModel;
    }
}
