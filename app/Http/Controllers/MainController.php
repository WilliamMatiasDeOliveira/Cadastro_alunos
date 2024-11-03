<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function cad_aluno()
    {
        return view('cad_aluno');
    }

    public function cad_aluno_submit(Request $request)
    {
        $request->validate(
            // rulles
            [
                'nome' => 'required|string',
                'data_nascimento' => 'required|date',
                'nome_mae' => 'required',
                'turma' => 'required',
                'periodo' => 'required',
                'telefone' => 'required',
                'celular' => 'required',
            ],
            // messages
            [
                'nome.required' => 'Este campo é obrigatório',
                'data_nascimento.required' => 'Este campo é obrigatório',
                'nome_mae.required' => 'Este campo é obrigatório',
                'turma.required' => 'Este campo é obrigatório',
                'periodo.required' => 'Este campo é obrigatório',
                'telefone.required' => 'Este campo é obrigatório',
                'celular.required' => 'Este campo é obrigatório',
            ]
        );

        $dados_aluno = $request->only(
            [
                'nome',
                'data_nascimento',
                'nome_mae',
                'nome_pai',
                'turma',
                'periodo',
                'foto',
                'observacao'
            ]
        );

        $contatos = [
            [
                'telefone' => $request->input('telefone'),
                'celular' => $request->input('celular'),
                'email' => $request->input('email')
            ]
        ];


        // verifica se este aluno já esta cadastrado
        $verify_aluno = Aluno::where('nome', $dados_aluno['nome'])->first();

        if($verify_aluno){
            return redirect()->route('cad_aluno')
            ->with('cad_fail', 'Este aluno já esta cadastrado');
        }


        // Cria o aluno e adiciona os contatos
        $aluno = Aluno::create($dados_aluno);
        $aluno->contatos()->createMany($contatos);

        return redirect()->route('cad_aluno')
        ->with('cad_suc', 'Aluno cadastrado com sucesso');
    }
}
