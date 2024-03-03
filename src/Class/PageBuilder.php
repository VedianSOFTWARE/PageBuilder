<?php

namespace Vedian\PageBuilder\Class;

class PageBuilder
{
    public static $userModel = 'App\\Models\\User';

    public static $pageModel = 'Vedian\\PageBuilder\\Models\\Page';

    public static $rowModel = 'Vedian\\PageBuilder\\Models\\Row';

    public static $columnModel = 'Vedian\\PageBuilder\\Models\\Column';

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
