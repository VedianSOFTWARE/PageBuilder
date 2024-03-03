<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Vedian\PageBuilder\Facades\PageSchema;
use Vedian\PageBuilder\Vedian;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->id();

            // Content functionality
            PageSchema::title($table);
            PageSchema::description($table);
            PageSchema::slug($table);

            // Status functionality
            PageSchema::status($table);
            PageSchema::expirable($table);

            // Author functionality
            PageSchema::publishable($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
