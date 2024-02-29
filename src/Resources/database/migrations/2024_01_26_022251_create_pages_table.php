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
        Schema::create('pages', function (Blueprint $table) {

            $table->id();

            VedianSchema::title($table);
            VedianSchema::description($table);
            VedianSchema::slug($table);

            VedianSchema::status($table);

            // Type of the page
            // $table->string('page_type')->default('page');

            // Type of the page
            // $table->string('page_layout')->default('full-width');'

            VedianSchema::between($table);
            VedianSchema::author($table);
            VedianSchema::publishableTimestamps($table);
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
