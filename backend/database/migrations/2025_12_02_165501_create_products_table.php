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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categorys');
            $table->string('name',50);
            $table->string('detail',255)->nullable();
            $table->float('price_sale');
            $table->integer('quantity')->default(0);
            $table->enum('status', ['on', 'off'])->default('on');
            $table->string('description',100)->nullable();
            $table->string('loaction',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};