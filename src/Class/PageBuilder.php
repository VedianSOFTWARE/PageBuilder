<?php

namespace Vedian\Cms\Class;

class PageBuilder
{
    public static $userModel = 'App\\Models\\User';

    public static $pageModel = 'Vedian\\Cms\\Models\\Page';

    public static $rowModel = 'Vedian\\Cms\\Models\\Row';

    public static $columnModel = 'Vedian\\Cms\\Models\\Column';

    public static function userModel()
    {
        return static::$userModel;
    }

    public static function pageModel()
    {
        return static::$pageModel;
    }

    public static function rowModel()
    {
        return static::$rowModel;
    }

    public static function columnModel()
    {
        return static::$columnModel;
    }
}
