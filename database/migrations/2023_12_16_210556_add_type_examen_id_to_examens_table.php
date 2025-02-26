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
        Schema::table('examens', function (Blueprint $table) {
            $table->foreignId('type_examen_id')->nullable()->constrained('type_examens', 'id');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('examens', function (Blueprint $table) {
            //
        });
    }
};