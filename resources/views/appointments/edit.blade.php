@extends('layouts.app')

@section('content')
<h1>Editar Cita</h1>
<form action="{{ route('appointments.update', $cita->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('appointments.form', ['cita' => $cita])
    <button type="submit">Actualizar</button>
</form>
@endsection
