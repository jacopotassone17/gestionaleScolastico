<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        // Se l'utente è loggato, lo reindirizzo alla dashboard
        return redirect()->route('dashboard');
    }
    // Altrimenti mostro la pagina di login
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::resource('classi', ClasseController::class);
    Route::resource('studenti', StudentController::class);
    Route::resource('docenti', TeacherController::class);
    Route::resource('voti', GradeController::class);
    Route::resource('presenze', AttendanceController::class);

    // Solo la rotta index per report (per filtro/visualizzazione)
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
});

require __DIR__.'/auth.php';
