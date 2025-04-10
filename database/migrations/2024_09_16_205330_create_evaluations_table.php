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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('type');
            $table->float('coef');
            $table->foreignId('discipline_id')->references('id')->on('disciplines');
            $table->float('coef_disc');
            $table->foreignId('classe_id')->references('id')->on('classes');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('periode_id')->references('id')->on('periodes');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
