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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('statut')->nullable();
            $table->string('code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse_postale')->nullable();
            $table->string('localisation')->nullable();
            $table->string('logo')->nullable();
            $table->string('photo')->nullable();
            $table->string('region')->nullable();
            $table->string('departement')->nullable();
            $table->string('ville')->nullable();
            $table->string('commune')->nullable();
            $table->string('quartier')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });


        Schema::table('etablissements', function (Blueprint $table) {
            //
            $table->foreignId('examen_id')->references('id')->on('examens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
