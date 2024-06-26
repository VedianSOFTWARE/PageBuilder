<?php

namespace Vedian\PageBuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void title(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void description(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void slug(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void status(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void between(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void author(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void publishableTimestamps(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void styling(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void content(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void softDeletes(\Illuminate\Database\Schema\Blueprint $table)
 * 
 * @see \Vedian\PageBuilder\Support\SchemaDefinition
 */
class Definition extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'definition-support';
    }
}
