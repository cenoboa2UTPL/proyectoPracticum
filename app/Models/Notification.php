<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'mensaje',
        'tipo',
        'estado',
        'id_cita',
    ];

    /**
     * Relación: Una notificación pertenece a una cita.
     */
    public function cita()
    {
        return $this->belongsTo(Appointment::class, 'id_cita');
    }
}
