<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    // Definisce le relazioni con il modello Workout
    public function workoutPlans()
    {
        
        return $this->belongsToMany(Workout::class);
    }

    public static function getProgramsByUserId($userId){
        $rows = DB::select('SELECT * FROM programs WHERE user_id = ? ORDER BY created_at DESC', [$userId]);
        if($rows){
            $programs = [];
            foreach($rows as $row){
                $program = new Program();
                $program->setRawAttributes((array)$row); //creosco un oggetto Program con gli attributi presi dal DB
                $programs[] = $program;
            }
            return $programs;
        }
        return null;
    }
}
