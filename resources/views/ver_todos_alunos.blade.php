@extends('layouts.main_layout')
@section('title', 'Todos alunos')

@section('content')

    <div class="container">
        @include('layouts.nav_bar')

        <div class="row">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <th>NOME</th>
                    <th>NASCIMENTO</th>
                    <th>MÃE</th>
                    <th>PAI</th>
                    <th>RG</th>
                    <th>TURMA</th>
                    <th>PERIODO</th>
                    <th>TELEFONE</th>
                    <th>CELULAR</th>
                    <th>EMAIL</th>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->data_nascimento }}</td>
                            <td>{{ $aluno->nome_mae }}</td>
                            <td>{{ $aluno->nome_pai }}</td>
                            <td>{{ $aluno->rg }}</td>
                            <td>{{ $aluno->turma }}</td>
                            <td>{{ $aluno->periodo }}</td>
                            <td>{{ $aluno->contatos->first()->telefone ?? 'N/A' }}</td>
                            <td>{{ $aluno->contatos->first()->celular ?? 'N/A' }}</td>
                            <td>{{ $aluno->contatos->first()->email ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- show succes --}}
            @if (session('up_suc'))
                <div class="alert alert-success text-center">
                    {{ session('up_suc') }}
                </div>
            @endif
        </div>

    </div>

@endsection
