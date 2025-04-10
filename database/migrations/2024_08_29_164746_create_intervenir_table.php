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
        Schema::create('intervenir', function (Blueprint $table) {
            $table->id();
            $table->boolean('pp')->default(false);
            $table->timestamps();
        });

        Schema::table("intervenir", function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
        });

        Schema::table("intervenir", function (Blueprint $table) {
            $table->foreignId('classe_id')->nullable()->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervenir');
    }
};
