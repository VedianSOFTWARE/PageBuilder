<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $this->sharedColumns($table);
        });

        // Create the page sections table
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();

            // The page the section belongs to
            $table->foreignId('page_id')->constrained('pages');

            // The template section the page section belongs to if chosen
            $table->foreignId('template_section_id')
                ->nullable()
                ->constrained('template_sections');

            $this->sharedColumns($table);
        });
    }

    private function sharedColumns(Blueprint $table): void
    {
        // For template reasoning
        $table->string('title');
        $table->text('description')->nullable();

        // Element styling and naming
        $table->string('element_tag')->nullable(); // The tag of the element
        $table->string('element_class')->nullable(); // The class of the element
        $table->string('element_id')->nullable(); // The id of the element
        $table->json('styling')->nullable(); // Overwrite the styling of the section

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
