<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function showExercisesByWorkoutId($workout_id){
        $exercises = Exercise::getExercisesByWorkoutId($workout_id);
        $program_id = Exercise::getProgrmIdByWorkoutId($workout_id);
        echo $program_id;
        return view('exercises.index', ['exercises' => $exercises, 'workout_id' => $workout_id, 'program_id' => $program_id]);
    }
}
