@extends('layouts.app')

@section('title', 'Crear Doctor')

@section('content')
    <h1>Crear Doctor</h1>

    <!-- Mostrar mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            @error('telefono')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" required>
            @error('especialidad')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Guardar</button>
    </form>
@endsection
