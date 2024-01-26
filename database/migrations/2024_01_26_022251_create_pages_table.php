<?php

use App\Enumerations\Status;
use App\Enumerations\Visibility;
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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();

            $table->enum(
                'visibility',
                Visibility::getValues()
            )->default(Visibility::PUBLIC->value);

            $table->enum(
                'status',
                Status::getValues()
            )->default(Status::DRAFT->value);

            $table->dateTime('valid_from')->nullable();
            $table->dateTime('valid_till')->nullable();

            $table->timestamp('published_at')->nullable();
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
