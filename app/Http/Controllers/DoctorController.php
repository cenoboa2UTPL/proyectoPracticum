<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar un listado de doctores
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo doctor
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'telefono' => 'required|string|max:15',
            'especialidad' => 'required|string|max:255',
        ]);

        // Crear un nuevo doctor en la base de datos
        Doctor::create($request->all());

        // Redirigir al formulario con un mensaje de éxito
        return redirect()->route('doctors.create')->with('success', 'Doctor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar los detalles de un doctor específico
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario para editar un doctor existente
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos actualizados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'telefono' => 'required|string|max:15',
            'especialidad' => 'required|string|max:255',
        ]);

        // Actualizar el doctor en la base de datos
        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('doctors.index')->with('success', 'Doctor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar un doctor de la base de datos
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado exitosamente.');
    }
}
