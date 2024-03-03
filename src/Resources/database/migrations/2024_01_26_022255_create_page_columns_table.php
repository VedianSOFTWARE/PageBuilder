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

        // Create the page sections table
        Schema::create('page_columns', function (Blueprint $table) {
            $table->id();

            VedianSchema::content($table);
            VedianSchema::styling($table, false);

            // TODO: Make it able to resolve from ::class or string
            VedianSchema::foreignId($table, 'page_rows');

            // VedianSchema::author($table);
            // VedianSchema::timestamps($table);
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
