<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use VedianSoft\VedianCms\Enumerations\ContentType;
use VedianSoft\VedianCms\Enumerations\Status;
use VedianSoft\VedianCms\Enumerations\Visibility;

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

            // Visibility of the page
            $table->enum(
                'visibility',
                Visibility::getValues()
            )->default(Visibility::PUBLIC->value);
            
            // Status of the page
            $table->enum(
                'status',
                Status::getValues()
            )->default(Status::DRAFT->value);
            
            // Time between which the page is visible
            $table->dateTime('visible_from')->nullable();
            $table->dateTime('visible_till')->nullable();
            
            // Time when the page was published
            $table->timestamp('published_at')->nullable();

            // Need trait to handle this functionality
            $table->foreignId('created_by')->constrained('users');

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
