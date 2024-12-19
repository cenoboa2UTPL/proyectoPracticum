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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->date('fecha'); // Fecha de la cita
            $table->time('hora'); // Hora de la cita
            $table->string('estado'); // Estado de la cita (por ejemplo: pendiente, cancelada, completada)
            $table->foreignId('id_paciente')->constrained('patients')->onDelete('cascade'); // Relación con la tabla pacientes
            $table->foreignId('id_doctor')->constrained('doctors')->onDelete('cascade'); // Relación con la tabla doctores
            $table->timestamps(); // Marca de tiempo para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments'); // Elimina la tabla si es necesario revertir la migración
    }
};

