<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'estado',
        'id_paciente',
        'id_doctor',
    ];

    /**
     * Relación: Una cita pertenece a un paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Patient::class, 'id_paciente');
    }

    /**
     * Relación: Una cita pertenece a un doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }
}
