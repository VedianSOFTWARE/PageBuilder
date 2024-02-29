<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use VedianSoftware\VedianCMS\Facades\VedianSchema;
use VedianSoftware\VedianCMS\Vedian;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Create the template sections table
        // Schema::create('section_templates', function (Blueprint $table) {

        //     $table->id();

        //     $this->duplicateColumns($table);

        //     $table->timestamps();
        //     $table->softDeletes();
        // });

        // Create the page sections table
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            
            VedianSchema::styling($table);

            // TODO: Make it able to resolve from ::class or string
            VedianSchema::foreignId($table, 'pages');

            // VedianSchema::author($table);
            // VedianSchema::timestamps($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
        // Schema::dropIfExists('template_sections');
    }
};
