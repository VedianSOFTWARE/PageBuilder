<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use VedianCMS\Facades\VedianSchema;
use VedianCMS\Vedian;

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
            VedianSchema::title($table);
            VedianSchema::description($table);
            VedianSchema::slug($table);

            // Status functionality
            VedianSchema::status($table);
            VedianSchema::expirable($table);

            // Author functionality
            VedianSchema::publishable($table);
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
