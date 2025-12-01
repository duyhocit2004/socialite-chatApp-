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
        Schema::create('story_medias_tablle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained('storys')->onDelete('cascade');
            $table->enum('type', ['video', 'image']);
            $table->string('url_media',255);
            $table->string('madia_index',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_medias_tablle');
    }
};