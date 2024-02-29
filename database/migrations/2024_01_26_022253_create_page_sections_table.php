<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use VedianSoftware\VedianCMS\Facades\VedianSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Create the template sections table
        Schema::create('template_sections', function (Blueprint $table) {
            $table->id();

            VedianSchema::titleColumns($table);
            VedianSchema::stylingColumns($table);
            VedianSchema::authorColumns($table);
            VedianSchema::softDeleteTimestamps($table);
        });

        // Create the page sections table
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();

            VedianSchema::titleColumns($table);
            VedianSchema::stylingColumns($table);
            VedianSchema::authorColumns($table);

            VedianSchema::foreignId($table, 'pages');
            VedianSchema::foreignId($table, 'template_sections');

            VedianSchema::softDeleteTimestamps($table);
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
