<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Vedian\Cms\Facades\PageSchema;
use Vedian\Cms\Vedian;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Create the page sections table
        Schema::create('page_columns', function (Blueprint $table) {
            $table->id();

            PageSchema::content($table);
            PageSchema::styling($table, false);

            // TODO: Make it able to resolve from ::class or string
            PageSchema::foreignId($table, 'page_rows');

            // PageSchema::author($table);
            // PageSchema::timestamps($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_columns');
    }
};
