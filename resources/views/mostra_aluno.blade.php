@extends('layouts.main_layout')
@section('title', 'Mostrar Aluno')

@section('content')

    <div class="container justify-content-center">

        @include('layouts.nav_bar')

        <div class="row text-center text-secondary mt-3">

            <div>
                @foreach ($alunos as $aluno)

                <div class="row justify-content-center">
                    <div class="col-4">
                        <style>img{border-radius: 50px;width: 110px}</style>
                        <img src="img/{{$aluno->foto}}" class="img-fluid">
                    </div>
                </div>
                    <ul style="list-style:none;">
                        <li>NOME : {{ $aluno->nome }}</li>
                        <li>DATA DE NASCIMENTO : {{ $aluno->data_nascimento }}</li>
                        <li>NOME DA MÃE : {{$aluno->nome_mae}}</li>
                        <li>NOME DO PAI : {{$aluno->nome_pai ?? 'N/A'}}</li>
                        <li>RG : {{$aluno->rg}}</li>
                        <li>TURMA : {{$aluno->turma}}</li>
                        <li>PERÍODO : {{$aluno->periodo}}</li>
                        <li>TELEFONE : {{ $aluno->contatos->first()->telefone ?? 'N/A' }}</li>
                        <li>CELULAR : {{ $aluno->contatos->first()->celular ?? 'N/A' }}</li>
                        <li>E-MAIL : {{ $aluno->contatos->first()->email ?? 'N/A' }}</li>
                    </ul>

                <div class="row col-12 mb-5">
                    <div class='col-6'>
                        <form action="{{route('excluir_aluno')}}" method="post">
                            @csrf
                            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">
                            <input type="submit"class='btn btn-danger col-3'value='EXCLUIR'>
                        </form>
                    </div>
                    <div class='col-6'>
                            <a href="{{route('editar_aluno', ['id'=>$aluno->id])}}"class='btn btn-primary col-3'>
                                EDITAR
                            </a>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>

@endsection
