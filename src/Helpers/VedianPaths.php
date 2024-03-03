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

        // If the path is a config or routes file, append the file extension
        switch ($name && $path === null) {
            case 'config':
                $path = "vedian-cms";
                break;
        }

        // If the path is a config or routes file, append the file extension
        switch ($name && $path) {
            case 'config':
            case 'routes':
                $path = "{$name}/{$path}.php";
                break;
            case 'migrations':
                $path = "database/migrations/{$path}";
                break;
            default:
                $path = "{$name}/{$path}";
                break;
        }


        // Return the resources path
        return self::resources($path);
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
