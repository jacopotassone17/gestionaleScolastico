<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\NotificheController;
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

// Tutte queste rotte sono ora pubbliche e accessibili senza login
Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

Route::resource('classi', ClasseController::class);
Route::resource('studenti', StudentController::class);
Route::resource('docenti', TeacherController::class);
Route::resource('voti', GradeController::class);
Route::resource('notifiche', NotificheController::class);


require __DIR__.'/auth.php';
