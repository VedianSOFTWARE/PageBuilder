<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Vedian\PageBuilder\Support\Facades\Definition;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Create the page sections table
        Schema::create('page_rows', function (Blueprint $table) {
            $table->id();

            Definition::styling($table);

            // TODO: Make it able to resolve from ::class or string
            Definition::foreignId($table, 'pages');

            // SchemaSupport::author($table);
            Definition::timestamps($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_rows');
    }
};
