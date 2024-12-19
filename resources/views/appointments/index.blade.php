@extends('layouts.app')

@section('content')
<h1>Listado de Citas</h1>

<a href="{{ route('appointments.create') }}">Crear Nueva Cita</a>

<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Doctor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($citas as $cita)
            <tr>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->doctor->nombre }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $cita->id) }}">Editar</a>
                    <form action="{{ route('appointments.destroy', $cita->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
