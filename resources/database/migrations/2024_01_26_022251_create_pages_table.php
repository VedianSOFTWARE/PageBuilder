<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Vedian\PageBuilder\Support\Facades\Definition;

return new class extends Migration
{
    /**
     * Run the Definitions.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->id();

            // Content functionality
            Definition::title($table);
            Definition::description($table);
            Definition::slug($table);

            // Status functionality
            Definition::status($table);
            Definition::expirable($table);

            // Author functionality
            Definition::publishable($table);
        });
    }

    /**
     * Reverse the Definitions.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
