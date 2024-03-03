<?php

namespace VedianCMS\Helpers;


class VedianPaths
{
    /**
     * Get the directory path within the resources directory.
     *
     * @return string
     */
    public static function __callStatic($name, $arguments)
    {
        // Get the path from the first argument
        $path = $arguments[0] ?? null;

        // If the name is "config" and the path is null, set the path to "vedian-cms"
        if ($name === "config" && $path === null) {
            $path = "vedian-cms";
        }

        // Return the resources path
        return self::resources("{$name}/{$path}.php");
    }


    /**
     * Get the path to the src directory.
     *
     * @return string
     */
    protected static function src()
    {
        return dirname(__DIR__);
    }

    /**
     * Get the path to the root of the package.
     *
     * @return string
     */
    protected static function root(string $path = null)
    {
        $path = $path ? "/{$path}" : "";

        return dirname(self::src()) . $path;
    }

    /**
     * Get the path to the resources directory.
     *
     * @return string
     */
    public static function resources(string $path = null)
    {
        $path = $path ? "/{$path}" : "";

        return self::root("resources") . $path;
    }
}
