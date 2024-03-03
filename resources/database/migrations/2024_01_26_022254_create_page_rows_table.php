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
        Schema::create('page_rows', function (Blueprint $table) {
            $table->id();

            VedianSchema::styling($table);
            
            // TODO: Make it able to resolve from ::class or string
            VedianSchema::foreignId($table, 'page_sections');

            // VedianSchema::author($table);
            // VedianSchema::timestamps($table);
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
