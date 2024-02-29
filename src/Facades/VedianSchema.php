<?php 

namespace VedianSoftware\VedianCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void stylingColumns(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void titleDescriptionColumns(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void softDeleteTimestamps(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void authorColumns(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void publishableTimestamps(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void between(\Illuminate\Database\Schema\Blueprint $table)
 * @method static void foreignId(\Illuminate\Database\Schema\Blueprint $table, string $table_name)
 * @method static void postStatus(\Illuminate\Database\Schema\Blueprint $table)
 * 
 * @see \VedianSoftware\VedianCMS\Support\VedianCMS
 */
class VedianSchema extends Facade 
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vedian-schema';
    }
}