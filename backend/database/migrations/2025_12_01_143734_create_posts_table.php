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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('content', 100);
            $table->enum('object', ['public', 'friend', 'friend except', 'specific friends', 'just me', 'Customize']);//Công khai-bạn bè-bạn bè ngoại trừ-bạn bè cụ thể-chỉ mình tôi-tùy chỉnh
            $table->string('location', 100);
            $table->foreignId('feelling')->constrained('emojis')->onDelete('cascade');
            $table->foreignId('post_status_id')->constrained('post_status')->onDelete('cascade');
            $table->enum('source_type', ['user', 'page', '']);
            $table->bigInteger('source_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};