<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function showExercisesByWorkoutId(Request $request, $workout_id){
        $exercises = Exercise::getExercisesByWorkoutId($workout_id);
        $program_id = Exercise::getProgrmIdByWorkoutId($workout_id);
        if($request->has('user_id')){
            $user_id = $request->query('user_id');
        }else{  
            $user_id = Auth()->id();
        }
        return view('exercises.index', ['exercises' => $exercises, 'workout_id' => $workout_id, 'program_id' => $program_id, 'user_id' => $user_id]);
    }
}
