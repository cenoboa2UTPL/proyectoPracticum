<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AvailabilityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas para la gestión de pacientes
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index'); // Listar pacientes
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create'); // Formulario de creación
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store'); // Guardar paciente
Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit'); // Formulario de edición
Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update'); // Actualizar paciente
Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy'); // Eliminar paciente

// Rutas para recursos (CRUD)
Route::resource('appointments', AppointmentController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('availabilities', AvailabilityController::class);
