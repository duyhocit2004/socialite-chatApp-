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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name_event',50);
            $table->dateTime('time_start');
            $table->dateTime('time_end')->nullable();
            $table->enum('type_event', ['online', 'offline'])->default('online');
            $table->string('description', 255)->nullable();
            $table->enum('object', ['public', 'friend', 'friend except', 'specific friends', 'just me', 'Customize']);//Công khai-bạn bè-bạn bè ngoại trừ-bạn bè cụ thể-chỉ mình tôi-tùy chỉnh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};