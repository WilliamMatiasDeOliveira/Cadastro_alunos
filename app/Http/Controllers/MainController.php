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
                'nome_pai' => 'nullable',
                'turma' => 'required',
                'periodo' => 'required',
                'telefone' => 'required',
                'rg' => 'required',
                'celular' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'observacao' => 'nullable|string|max:500',
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
                'foto.image' => 'Este arquivo deve ser uma imagem',
                'foto.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg',
                'obeservacao.max' => 'Este campo deve ter no :max caractéres',
                'rg.required' => 'Este campo é obrigatório'
            ]
        );

        $dados_aluno = $request->only(
            [
                'nome',
                'data_nascimento',
                'nome_mae',
                'nome_pai',
                'rg',
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
        $verify_aluno = Aluno::where('rg', $dados_aluno['rg'])->first();

        if ($verify_aluno) {
            return redirect()->route('cad_aluno')
                ->with('cad_fail', 'Este aluno já esta cadastrado');
        }

        // verifica se existe foto e se a foto é valida
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            // pega o request da foto
            $foto = $request->foto;
            // pega a extensão da foto
            $extension = $foto->extension();
            /**
             * da um nome para a foto com o tempo de agora
             * depois concatena com a extensão
             * $foto_name = time() . '.' . $extension;
             *
             * e concatena com o time de agora
             * strtotime('now')
             *
             * e concatena com a $extension
             *
             * exemplo : $foto_name = ilefhqgalieg3u20240625.jpg
             */
            $foto_name = time() . '.' . $extension;

            $foto->move(public_path('img'), $foto_name);
            $dados_aluno['foto'] = $foto_name;
        } else {
            $dados_aluno['foto'] = null;
        }



        // Cria o aluno e adiciona os contatos
        $aluno = Aluno::create($dados_aluno);
        $aluno->contatos()->createMany($contatos);

        return redirect()->route('cad_aluno')
            ->with('cad_suc', 'Aluno cadastrado com sucesso');
    }

    public function buscar_aluno()
    {
        return view('buscar_aluno');
    }

    public function buscar_aluno_submit(Request $request)
    {
        $request->validate(
            // rules
            [
                'rg' => 'required|string'
            ],
            // messages
            [
                'rg.required' => 'Digite o rg do aluno para efetuar a consulta'
            ]
        );

        $rg = $request->input('rg');

        $alunos = Aluno::with('contatos')
            ->where('rg', $rg)->get();

        if ($alunos->isEmpty()) {
            return redirect()->route('buscar_aluno')->with('error', 'Este aluno não existe');
        }

        return view('mostra_aluno', compact('alunos'));
    }

    public function mostra_aluno()
    {
        return view('mostra_aluno');
    }

    public function ver_todos_alunos()
    {
        $alunos = Aluno::with('contatos')
            ->orderBy('nome')->get();

        return view('ver_todos_alunos', compact('alunos'));
    }

    public function excluir_aluno(Request $request)
    {
        $aluno_id = $request->input('aluno_id');

        $aluno = Aluno::findOrFail($aluno_id);

        // Verifica se o arquivo de foto existe e exclui
        if ($aluno->foto && file_exists(public_path('img/' . $aluno->foto))) {
            unlink(public_path('img/' . $aluno->foto));
        }

        $aluno->delete();

        return redirect()->route('buscar_aluno')->with('delete', 'Aluno deletado');
    }

    public function editar_aluno($aluno_id)
    {

        $aluno = Aluno::with('contatos')->find($aluno_id);

        if (!$aluno) {
            return redirect()->back();
        }

        return view('editar_aluno', compact('aluno'));
    }

    public function editar_aluno_submit(Request $request, $id)
    {
        $request->validate(
            // rulles
            [
                'nome' => 'required|string',
                'data_nascimento' => 'required|date',
                'nome_mae' => 'required',
                'nome_pai' => 'nullable',
                'turma' => 'required',
                'periodo' => 'required',
                'telefone' => 'required',
                'rg' => 'required',
                'celular' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'observacao' => 'nullable|string|max:500',
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
                'foto.image' => 'Este arquivo deve ser uma imagem',
                'foto.mimes' => 'A imagem deve ser do tipo jpeg, png, jpg',
                'obeservacao.max' => 'Este campo deve ter no :max caractéres',
                'rg.required' => 'Este campo é obrigatório'
            ]
        );

        $aluno = Aluno::with('contatos')->findOrFail($id);

        // verifica se existe foto e se a foto é valida
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            // pega o request da foto
            $foto = $request->foto;
            // pega a extensão da foto
            $extension = $foto->extension();
            /**
             * da um nome para a foto com o tempo de agora
             * depois concatena com a extensão
             * $foto_name = time() . '.' . $extension;
             *
             * e concatena com o time de agora
             * strtotime('now')
             *
             * e concatena com a $extension
             *
             * exemplo : $foto_name = ilefhqgalieg3u20240625.jpg
             */
            $foto_name = time() . '.' . $extension;

            $foto->move(public_path('img'), $foto_name);
            $aluno->foto = $foto_name;
        }

        $aluno->nome = $request->input('nome');
        $aluno->data_nascimento = $request->input('data_nascimento');
        $aluno->rg = $request->input('rg');
        $aluno->nome_mae = $request->input('nome_mae');
        $aluno->nome_pai = $request->input('nome_pai');
        $aluno->turma = $request->input('turma');
        $aluno->periodo = $request->input('periodo');
        $aluno->observacao = $request->input('observacao');
        $aluno->save();

        $contato = $aluno->contatos->first();
        $contato->telefone = $request->input('telefone');
        $contato->celular = $request->input('celular');
        $contato->email = $request->input('email');
        $contato->save();

        return redirect()->route('ver_todos_alunos')
            ->with('up_suc', 'Aluno atualizado com sucesso!');
    }
}
