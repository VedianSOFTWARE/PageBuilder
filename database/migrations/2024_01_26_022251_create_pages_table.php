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
        Schema::create('pages', function (Blueprint $table) {

            $table->id();
            
            // Title of the page
            $table->string('title');

            // Unique slug for the page
            $table->string('slug')->unique();

            // Type of the page
            $table->string('page_type')->default('page');

            // Type of the page
            // $table->string('page_layout')->default('full-width');

            // Content of the page
            $table->string('status')->default('draft');     // draft, published, unpublished
            $table->tinyInteger('is_private')->default(1);  // 1 = private, 0 = public

            // Visibility of the page
            $table->dateTime('active_from')->nullable(); // null = always active
            $table->dateTime('active_till')->nullable();

            // Time when the page was published
            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->constrained('users');

            // 
            $table->timestamps();
            $table->softDeletes();
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
