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
        Schema::create('parcours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('parcours', function (Blueprint $table) {
            $table->foreignId('eleve_id')->nullable()->index()->references('id')->on('eleves');
        });

        Schema::table('parcours', function (Blueprint $table) {
            $table->foreignId('classe_id')->nullable()->index()->references('id')->on('classes');
        });

        Schema::table('parcours', function (Blueprint $table) {
            $table->foreignId('annee_academique_id')->nullable()->index()->references('id')->on('annee_academiques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcours');
    }
};
