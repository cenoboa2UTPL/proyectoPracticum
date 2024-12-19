<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'especialidad',
        'email',
        'telefono',
    ];

    /**
     * Relación: Un doctor tiene muchas citas.
     */
    public function citas()
    {
        return $this->hasMany(Appointment::class, 'id_doctor');
    }

    /**
     * Relación: Un doctor tiene muchas disponibilidades.
     */
    public function disponibilidades()
    {
        return $this->hasMany(Availability::class, 'id_doctor');
    }
}

