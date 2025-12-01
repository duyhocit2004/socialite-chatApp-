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
        Schema::create('storys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('content', 100)->nullable();
            $table->enum('object',['public', 'private']);
            $table->enum('type_story', ['text','image']);
            $table->string('content', 255)->nnullable();
            $table->string('backgound',255)->nullable();
            $table->foreignId('music_id')->constrained('musics')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storys');
    }
};