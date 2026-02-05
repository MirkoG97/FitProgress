<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class userTrainerAssignment extends Model
{
    use HasFactory;
     
    //Definisce la relazione verso l'atleta (User)
    public function athlete()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Definisce la relazione verso il trainer (User)
    public function trainer()
    {
        return $this->belongsTo(User::class, 'personal_trainer_id');
    }
}
