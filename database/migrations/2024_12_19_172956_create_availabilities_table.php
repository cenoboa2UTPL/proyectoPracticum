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
        /**Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            */
            Schema::create('availabilities', function (Blueprint $table) {
                $table->id();
                $table->date('fecha');
                $table->time('hora_inicio');
                $table->time('hora_fin');
                $table->foreignId('id_doctor')->constrained('doctors')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
