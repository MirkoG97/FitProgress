<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkoutSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'reps',
        'sets',
        'rest',
        'notes',
        'weight',
    ];

    // Definisce le relazioni con il modello exercise
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }

    // Definisce le relazioni con il modello Workout
    public function workoutPlans()
    {
        
        return $this->belongsToMany(Workout::class);
    }

    public static function getSessionsByExerciseIdAndWorkoutIdAndUserId($exerciseId, $workoutId, $userId){
        $rows = DB::select('SELECT ws.*, e.name AS exercise_name, u.name AS user_name
                            FROM workout_sessions AS ws
                            JOIN exercises AS e 
                                ON ws.exercise_id = e.id
                            JOIN workout_plans AS w 
                                ON ws.workout_id = w.id
                            JOIN users AS u 
                                ON ws.user_id = u.id
                            WHERE ws.exercise_id = ?
                                AND ws.workout_id = ?
                                AND ws.user_id = ?
                            ORDER BY ws.created_at DESC;', [$exerciseId, $workoutId, $userId]);
        if($rows){
            $sessions = [];
            foreach($rows as $row){
                $session = new WorkoutSession();
                $session->setRawAttributes((array)$row); //creosco un oggetto WorkoutSession con gli attributi presi dal DB
                $sessions[] = $session;
            }
            return $sessions;
        }
        return null;
    }
}
