<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'target_muscle',
        'description',
    ];

    // Definisce le relazioni con il modello workout
    public function workoutPlans()
    {
        
        return $this->belongsToMany(Workout::class);
    }

    public static function getExercisesByWorkoutId($workoutId){
        $rows = DB::select('SELECT * 
                            FROM workout_exercise AS we
                            JOIN exercises AS e 
                                ON we.exercise_id = e.id
                            WHERE we.workout_id = ?
                            ORDER BY we.created_at DESC;', [$workoutId]);
        if($rows){
            $exercises = [];
            foreach($rows as $row){
                $exercise = new Exercise();
                $exercise->setRawAttributes((array)$row); //creosco un oggetto Exercise con gli attributi presi dal DB
                $exercises[] = $exercise;
            }
            return $exercises;
        }
        return null;
    }

    public static function getProgrmIdByWorkoutId($workoutId){
        $row = DB::selectOne('SELECT program_id
                                FROM program_workout 
                                WHERE workout_id = ?;', [$workoutId]);
        if($row){
            return $row->program_id;
        }
        return null;
    }
}
