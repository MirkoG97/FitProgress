<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\WorkoutSession;


class WorkoutSessionController extends Controller
{
    public function showSessionsByExerciseIdAndWorkoutId ($workout_id, $exercise_id){
        $userId = auth()->id();
        $sessions = WorkoutSession::getSessionsByExerciseIdAndWorkoutIdAndUserId($exercise_id, $workout_id, $userId);
        return view('workoutsessions.index', ['sessions' => $sessions, 'workout_id' => $workout_id, 'exercise_id' => $exercise_id]);
    }
}
