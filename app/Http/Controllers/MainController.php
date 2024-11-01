<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function cad_aluno(){
        return view('cad_aluno');
    }

    public function cad_aluno_submit(Request $request){
        echo 'CAD ALUNO';
    }
}
