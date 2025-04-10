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
        Schema::create('moyennes', function (Blueprint $table) {
            $table->id();
            $table->float('moy');
            $table->float('moy_coef');
            $table->string('rang');
            $table->string('appreciation');
            $table->timestamps();
        });

        Schema::table('moyennes', function (Blueprint $table) {
            $table->foreignId('eleve_id')->nullable()->index()->references('id')->on('eleves');
        });

        Schema::table('moyennes', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->index()->references('id')->on('periodes');
        });

        Schema::table('moyennes', function (Blueprint $table) {
            $table->foreignId('discipline_id')->nullable()->index()->references('id')->on('disciplines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moyennes');
    }
};
