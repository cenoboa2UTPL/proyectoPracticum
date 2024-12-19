<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar un listado de pacientes
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo paciente
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'telefono' => 'required|string|max:15',
        ]);

        // Crear un nuevo paciente en la base de datos
        Patient::create($request->all());

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('patients.create')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar los detalles de un paciente específico
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario para editar un paciente existente
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos actualizados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $id,
            'telefono' => 'required|string|max:15',
        ]);

        // Actualizar el paciente en la base de datos
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('patients.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar un paciente de la base de datos
        $patient = Patient::findOrFail($id);
        $patient->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('patients.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
