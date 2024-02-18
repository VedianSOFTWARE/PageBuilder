<?php

namespace VedianSoftware\Cms;

use ReflectionClass;
use VedianSoftware\Cms\Services\ReflectionService;

class Vedian
{
    // Build your next great package.

    public static function reflectionService(string $concrete)
    {
        return new ReflectionService(new ReflectionClass($concrete));
    }
}
