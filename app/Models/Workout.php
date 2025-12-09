<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Definisce le relazioni con il modello Program
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    // Definisce le relazioni con il modello exercise
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class);
    }

    public static function getWorkoutByProgramId($programId){
        //$rows = DB::select('SELECT workout_id FROM program_workout WHERE program_id = ? ORDER BY created_at DESC', [$programId]);
        $rows = DB::select('SELECT 
                                pw.workout_id,
                                wp.name, 
                                wp.description
                            FROM program_workout AS pw
                            JOIN workout_plans AS wp 
                                ON pw.workout_id = wp.id
                            WHERE pw.program_id = ?
                            ORDER BY pw.created_at DESC;', [$programId]);
        if($rows){
            $workouts = [];
            foreach($rows as $row){
                $workout = new Workout();
                $workout->setRawAttributes((array)$row); //creosco un oggetto Workout con gli attributi presi dal DB
                $workouts[] = $workout;
            }
            return $workouts;
        }
        return null;
    }

    /*
    public static function getWorkoutPrograms(){
        $rows = DB::select('SELECT * FROM workout_plans ORDER BY created_at DESC');
        if($rows){
            $workout_plans = [];
            foreach($rows as $row){
                $workout = new Workout();
                $workout->setRawAttributes((array)$row); //creosco un oggetto Program con gli attributi presi dal DB
                $workout_plans[] = $program;
            }
            return $workout_plans;
        }
        return null;
    }

    public static function getWorkoutById($workoutId){
        $row = DB::select('SELECT * FROM workout_plans WHERE id = ? ORDER BY created_at DESC', [$workoutId]);
        if($row){
            $workout = new Workout();
            $workout->setRawAttributes((array)$row[0]); //creosco un oggetto Program con gli attributi presi dal DB
            return $workout;
        }
        return null;
    }*/
}
