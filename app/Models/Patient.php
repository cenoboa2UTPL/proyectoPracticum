<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    /**
     * Relación: Un paciente tiene muchas citas.
     */
    public function citas()
    {
        return $this->hasMany(Appointment::class, 'id_paciente');
    }
}
