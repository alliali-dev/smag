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
        Schema::create('cycles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::table("cycles", function (Blueprint $table) {
            $table->foreignId('annee_academique_id')->index()->nullable()->references('id')->on('annee_academiques');
        });

        Schema::table("cycles", function (Blueprint $table) {
            $table->foreignId('etablissement_id')->index()->nullable()->references('id')->on('etablissements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycles');
    }
};
