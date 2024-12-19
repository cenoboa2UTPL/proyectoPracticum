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
        /**Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            */
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->text('mensaje');
                $table->string('tipo');
                $table->string('estado');
                $table->foreignId('id_cita')->constrained('appointments')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
