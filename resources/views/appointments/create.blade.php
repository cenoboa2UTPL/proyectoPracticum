@extends('layouts.app')

@section('content')
<h1>Crear Cita</h1>
<form action="{{ route('appointments.store') }}" method="POST">
    @include('appointments.form')
    <button type="submit">Crear</button>
</form>
@endsection
