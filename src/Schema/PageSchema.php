<?php

namespace Vedian\PageBuilder\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Vedian\PageBuilder\Enum\Status;
use Vedian\PageBuilder\Enum\Visibility;

/**
 * Class Schema
 * 
 * The schema for the Vedian CMS.
 *
 * @package Cms
 */
class PageSchema
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
        // draft, published, archived deleted
        $table->enum('status', Status::schema())->default(Status::DRAFT);
        $table->enum('visibility', Visibility::schema())->default(Visibility::PRIVATE);
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
        $table->foreignId('author_id')
            ->constrained('users');

        $table->foreignId('editor_id')
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
    }

    /**
     * Add the editors to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function editors(Blueprint $table)
    {
        $table->foreignId('created_by')
            ->constrained('users');

        $table->foreignId('updated_by')
            ->nullable()
            ->constrained('users');

        $table->foreignId('deleted_by')
            ->nullable()
            ->constrained('users');
    }

    /**
     * Add the soft deletes to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function softDeletes(Blueprint $table)
    {
        $table->softDeletes();
    }

    /**
     * Add the publishable columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function publishable(Blueprint $table)
    {
        $this->editors($table);
        $table->timestamps();
        $table->softDeletes();
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
     * Add the expirable columns to the table.
     *
     * @param \Illuminate\Database\Schema\Blueprint $table
     * @return void
     */
    public function expirable(Blueprint $table)
    {
        $table->dateTime('activates')->nullable();
        $table->dateTime('expires')->nullable();
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
