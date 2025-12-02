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
        Schema::create('page_intros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pages_id')->constrained('pages')->onDelete('cascade');
            $table->string('page_format',50)->nullable();
            $table->string('phone_number',11)->nullable();
            $table->string('email',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_intros');
    }
};