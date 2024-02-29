<?php

namespace VedianSoftware\VedianCMS\Support;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

/**
 * Class VedianSchema
 * 
 * The schema for the Vedian CMS.
 *
 * @package VedianSoftware\VedianCMS
 */
class VedianSchemaSupport
{
    /**
     * Add the styling columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function stylingColumns(Blueprint $table)
    {
        $table->string('element_tag')->nullable(); // The tag of the element
        $table->string('element_class')->nullable(); // The class of the element
        $table->string('element_id')->nullable(); // The id of the element
        $table->json('styling')->nullable(); // Overwrite the styling of the section
    }

    /**
     * Add the title and description columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function titleColumns(Blueprint $table)
    {
        $table->string('title')->nullable(); // The title of the section
        $table->text('description')->nullable(); // The description of the section
    }

    /**
     * Add the soft delete timestamps to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function softDeleteTimestamps(Blueprint $table)
    {
        $table->timestamps();
        $table->softDeletes();
    }

    /**
     * Add the author columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function authorColumns(Blueprint $table)
    {
        $table->foreignId('author')->constrained('users');
    }

    /**
     * Add a foreign id to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @param string $constrained
     * @param bool $nullable
     * @return void
     */
    public function foreignId(Blueprint $table, $constrained, $nullable = false)
    {
        $column = $this->constrainedToId($constrained);

        $table->foreignId($column)
            ->nullable($nullable)
            ->constrained($constrained);
    }

    /**
     * Add a foreign id to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @param string $column
     * @param string $constrained
     * @param bool $nullable
     * @return void
     */
    private function constrainedToId(string $table)
    {
        return Str::of($table)->singular()->append('_id');
    }
}
