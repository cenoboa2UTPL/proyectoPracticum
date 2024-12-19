<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Citas')</title>
    <!-- Agrega estilos aquí si los necesitas -->
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Citas</h1>
        <nav>
            @if (Route::has('appointments.index'))
                <a href="{{ route('appointments.index') }}">Citas</a>
            @endif
            @if (Route::has('patients.index'))
                <a href="{{ route('patients.index') }}">Pacientes</a>
            @endif
            @if (Route::has('doctors.index'))
                <a href="{{ route('doctors.index') }}">Doctores</a>
            @endif
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Citas</p>
    </footer>
</body>
</html>

