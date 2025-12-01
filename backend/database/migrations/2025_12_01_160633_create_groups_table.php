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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('description',255)->nullable();
            $table->string('main_image',100)->nullable();
            $table->string('sub_image', 100)->nullable();
            $table->enum('select_privacy', ['public', 'private'])->default('public');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['activate', 'locked'])->default('activate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};