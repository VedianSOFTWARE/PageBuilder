<?php

namespace Vedian\PageBuilder\States;

/**
 * The Visibility enum represents the visibility options for a resource.
 */
enum Visibility: string
{
    /**
     * The resource is private and can only be accessed by the owner.
     */
    case PRIVATE = 'private';

    /**
     * The resource is public and can be accessed by anyone.
     */
    case PUBLIC = 'public';

    /**
     * The resource is visible to a specific team.
     */
    case TEAM = 'team';

    public static function schema(): array
    {
        return [
            self::PRIVATE->name => self::PRIVATE->value,
            self::PUBLIC->name => self::PUBLIC->value,
            self::TEAM->name => self::TEAM->value,
        ];
    }

    /**
     * Convert the enum values to an associative array.
     *
     * @return array The enum values as an associative array.
     */
    public static function toArray(): array
    {
        return [
            self::PRIVATE->name => self::PRIVATE->value,
            self::PUBLIC->name => self::PUBLIC->value,
            self::TEAM->name => self::TEAM->value,
        ];
    }

    /**
     * Get the value of the private visibility option.
     *
     * @return string The value of the private visibility option.
     */
    public static function private()
    {
        return self::PRIVATE->value;
    }

    /**
     * Get the value of the public visibility option.
     *
     * @return string The value of the public visibility option.
     */
    public static function public()
    {
        return self::PUBLIC->value;
    }

    /**
     * Get the value of the team visibility option.
     *
     * @return string The value of the team visibility option.
     */
    public static function team()
    {
        return self::TEAM->value;
    }
}
