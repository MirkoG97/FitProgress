<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Workout;

class WorkoutController extends Controller
{
    public function showWorkoutProgramsByProgramId($program_id){
        $workouts = Workout::getWorkoutByProgramId($program_id);
        return view('workouts.index', ['workouts' => $workouts, 'program_id' => $program_id]);
    }

}
