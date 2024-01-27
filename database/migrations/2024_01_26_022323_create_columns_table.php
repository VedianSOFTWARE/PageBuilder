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
        Schema::create('columns', function (Blueprint $table) {
            

            // $table->tinyInteger('order')->default(0);
            // $table->foreignId('row_id')->constrained('rows');
            $table->id();
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->json('style')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
