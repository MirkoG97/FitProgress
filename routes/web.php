<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutSessionController;

/*Route::get('/', function () {
    return view('home', ['pageTitle' => 'Home']);
})->name('home');*/

Route::get('/', function () {
    return view('user_dashboard', ['pageTitle' => 'Dahboard']);
})->name('home')->middleware('auth');;

// Rotta per la registrazione utente
Route::get ('/register', [UserController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post ('/register', [UserController::class, 'register'])->name('registerUser');

// Rotta per il login utente
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

// Rotta per il logout utente
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser'); 

// Rotta per visualizzare i programmi dell'utente autenticato
Route::get('/programs', [ProgramController::class, 'showProgramsByUserId'])->name('programsByUser');

// Rotta per visualizzare gli allenamenti di un programma specifico
Route::get('/programs/{program_id}/workouts', [WorkoutController::class, 'showWorkoutProgramsByProgramId'])->name('workoutsByProgram');

// Rotta per visualizzare gli esercizi di un allenamento specifico
Route::get('/workouts/{workout_id}/exercises', [ExerciseController::class, 'showExercisesByWorkoutId'])->name('exercisesByWorkout');

// Rotta per visualizzare le sessioni di un esercizio specifico in un allenamento specifico
Route::get('/workouts/{workout_id}/exercises/{exercise_id}/sessions', [WorkoutSessionController::class, 'showSessionsByExerciseIdAndWorkoutId'])->name('sessionsByExerciseAndWorkout');

// Rotta per visualizzare gli utenti (solo per trainer e admin)
Route::get('/athletes', [UserController::class, 'showAthletesByTrainer'])->name('usersByTrainer')->middleware('auth');
