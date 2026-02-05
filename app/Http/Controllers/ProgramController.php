<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\User;

class ProgramController extends Controller
{
    /*public function showProgramsByUserId(){
        $userId = auth()->id();
        $programs = Program::getProgramsByUserId($userId);
        return view('programs.index', ['programs' => $programs]); 
    }*/

    public function showProgramsByUserId(request $request){
        if($request->has('user_id')){
            $user_id = $request->query('user_id');
        }else{  
            $user_id = Auth()->id();
        }
        $programs = Program::getProgramsByUserId($user_id);
        return view('programs.index', ['programs' => $programs, 'user_id' => $user_id, 'pageTitle' => 'My Programs']); 
    }
    
}
