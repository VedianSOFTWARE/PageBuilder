<?php

namespace VedianSoftware\VedianCMS\Support;

use Closure;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Class VedianSchema
 * 
 * The schema for the Vedian CMS.
 *
 * @package VedianSoftware\VedianCMS
 */
class VedianSchema
{

    /**
     * Add the content columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function content(Blueprint $table)
    {
        $table->json('content')->nullable(); // The content of the section
    }

    /**
     * Add the styling columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function styling(Blueprint $table, bool $withTag = true)
    {
        if ($withTag) {
            $table->string('element_tag')->nullable(); // The tag of the element
        }
        $table->string('element_id')->nullable(); // The id of the element
        $table->string('element_class')->nullable(); // The class of the element
        $table->json('element_style')->nullable(); // Overwrite the styling of the section
    }

    /**
     * Add the status columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function status(Blueprint $table)
    {
        $table->string('post_status')->default('draft');     // draft, published, unpublished
        $table->tinyInteger('post_visibility')->default(1);  // 1 = private, 0 = public
    }

    /**
     * Add the title and description columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function title(Blueprint $table)
    {
        $table->string('title'); // The title of the section
    }

    /**
     * Add the title and description columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function description(Blueprint $table)
    {
        $table->text('description')->nullable(); // The description of the section
    }

    /**
     * Add the title and description columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function slug(Blueprint $table)
    {
        $table->string('slug')->unique(); // The slug of the section (unique identifier   
    }

    /**
     * Add the author columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function author(Blueprint $table)
    {
        $table->foreignId('created_by')
            ->constrained('users');

        $table->foreignId('updated_by')
            ->nullable()
            ->constrained('users');
    }

    /**
     * Add the timestamps to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function timestamps(Blueprint $table)
    {
        $table->timestamps();
        $table->softDeletes();
    }

    /**
     * Add the publishable timestamps to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function publishableTimestamps(Blueprint $table)
    {
        $table->timestamp('published_at')->nullable();
        $this->timestamps($table);
    }

    /**
     * Add the foreign id to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @param string $constrained
     * @param bool $nullable
     * @return void
     */
    public function foreignId(Blueprint $table, $constrained, $nullable = false)
    {
        $column = $this->constrainedToId($constrained);

        $table
            ->foreignId($column)
            ->nullable($nullable)
            ->constrained($constrained);
    }

    /**
     * Add the between columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function between(Blueprint $table)
    {
        $table->dateTime('active_from')->nullable();
        $table->dateTime('active_till')->nullable();
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
