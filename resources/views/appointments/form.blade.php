@csrf

<label for="fecha">Fecha:</label>
<input type="date" name="fecha" value="{{ old('fecha', $cita->fecha ?? '') }}" required>

<label for="hora">Hora:</label>
<input type="time" name="hora" value="{{ old('hora', $cita->hora ?? '') }}" required>

<label for="id_paciente">Paciente:</label>
<select name="id_paciente" required>
    @foreach ($pacientes as $paciente)
        <option value="{{ $paciente->id }}" {{ isset($cita) && $cita->id_paciente == $paciente->id ? 'selected' : '' }}>
            {{ $paciente->nombre }}
        </option>
    @endforeach
</select>

<label for="id_doctor">Doctor:</label>
<select name="id_doctor" required>
    @foreach ($doctores as $doctor)
        <option value="{{ $doctor->id }}" {{ isset($cita) && $cita->id_doctor == $doctor->id ? 'selected' : '' }}>
            {{ $doctor->nombre }}
        </option>
    @endforeach
</select>

<button type="submit">Guardar</button>
