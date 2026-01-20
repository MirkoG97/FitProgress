<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class ProgramController extends Controller
{
    /*public function showProgramsByUserId(){
        $userId = auth()->id();
        $programs = Program::getProgramsByUserId($userId);
        return view('programs.index', ['programs' => $programs]); 
    }*/

    public function showProgramsByUserId(?int $userId = null){
        echo $userId;
        if(!isset($userId)){
            $userId = auth()->id();
            echo "non è settato";
        } 
        $programs = Program::getProgramsByUserId($userId);
        return view('programs.index', ['programs' => $programs]); 
    }
}
