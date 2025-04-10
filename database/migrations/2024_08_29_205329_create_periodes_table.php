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
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('libelle')->nullable();
            $table->timestamps();
        });

        Schema::table('periodes', function (Blueprint $table) {
            $table->foreignId('annee_academique_id')->nullable()->references('id')->on('annee_academiques');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodes');
    }
};
