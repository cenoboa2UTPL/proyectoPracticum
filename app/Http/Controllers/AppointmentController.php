<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar citas con relaciones de paciente y doctor
        $citas = Appointment::with('paciente', 'doctor')->get();
        return view('appointments.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los pacientes y doctores
        $pacientes = Patient::all();
        $doctores = Doctor::all();
        return view('appointments.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
  
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_paciente' => 'required|exists:patients,id',
            'id_doctor' => 'required|exists:doctors,id',
        ]);
    
        // Agregar valor predeterminado para el campo 'estado'
        $datosCita = $request->all();
        $datosCita['estado'] = $request->input('estado', 'pendiente');
    
        Appointment::create($datosCita);
    
        return redirect()->route('appointments.index')->with('success', 'Cita creada exitosamente.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // Mostrar detalles de una cita específica (opcional, si es necesario)
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // Obtener todos los pacientes y doctores
        $pacientes = Patient::all();
        $doctores = Doctor::all();
        return view('appointments.edit', compact('appointment', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validar la entrada
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'id_paciente' => 'required|exists:patients,id',
            'id_doctor' => 'required|exists:doctors,id',
        ]);

        // Actualizar la cita
        $appointment->update($request->all());
        return redirect()->route('appointments.index')->with('success', 'Cita actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // Eliminar la cita
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
