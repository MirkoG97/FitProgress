<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\WorkoutSession;


class WorkoutSessionController extends Controller
{
    public function showSessionsByExerciseIdAndWorkoutId (Request $request, $workout_id, $exercise_id){
        if($request->has('user_id')){
            $userId = $request->query('user_id');
        }else{  
            $userId = Auth()->id();
        }
        $sessions = WorkoutSession::getSessionsByExerciseIdAndWorkoutIdAndUserId($exercise_id, $workout_id, $userId);
        return view('workoutsessions.index', ['sessions' => $sessions, 'workout_id' => $workout_id, 'exercise_id' => $exercise_id, 'user_id' => $userId]);
    }
}
