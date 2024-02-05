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
        Schema::create('rows', function (Blueprint $table) {
            $table->id();
            
            // TODO: in later revisino this probably changes
            $table->string('title');
            $table->text('body')->nullable();

            // $table->string('title');

            // Necessary for creating reusable components
            // $table->string('slug')->unique();
            
            // $table->tinyText('description')->nullable();
            // $table->string('template')->nullable();
            // $table->tinyText('style')->nullable();

            // $table->dateTime('visible_from')->nullable();
            // $table->dateTime('visible_till')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->foreignId('created_by')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
