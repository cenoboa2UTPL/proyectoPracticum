<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_fin',
        'id_doctor',
    ];

    /**
     * Relación: Una disponibilidad pertenece a un doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }
}


