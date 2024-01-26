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
        Schema::create('row_blocks', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('title');

            $table->tinyText('style')->nullable();

            $table->tinyInteger('order')->default(0);
            $table->foreignId('row_id')->constrained('rows');

            $table->timestamps();
            $table->softDeletes();
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
