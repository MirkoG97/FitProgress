<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class ProgramController extends Controller
{
    public function showProgramsByUserId(){
        $userId = auth()->id();
        $programs = Program::getProgramsByUserId($userId);
        return view('programs.index', ['programs' => $programs]); 
    }
}
