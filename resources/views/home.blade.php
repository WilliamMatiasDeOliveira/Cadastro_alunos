@extends('layouts.main_layout')
@section('title', 'Home')

@section('content')

    <div class="container-fluid">


        @include('layouts.nav_bar')

        <div class="row col-12 mt-5 mb-5 justify-content-center">
            <div class='col-4'>
                <a href="{{ route('cad_aluno') }}" class="btn btn-warning form-control">
                    Cadastrar aluno
                </a>
            </div>
        </div>

        <div class="row col-12 mt-5 mb-5 justify-content-center">
            <div class='col-4'>
                <a href="{{ route('buscar_aluno') }}" class="btn btn-primary form-control">
                    Buscar aluno
                </a>
            </div>
        </div>

        <div class="row col-12 mt-5 mb-5 justify-content-center">
            <div class='col-4'>
                <form action="{{ route('ver_todos_alunos') }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-secondary form-control"value='Ver todos alunos'>
                </form>
            </div>
        </div>
    </div>

    </div>

    @if (session('cad_suc'))
        <div class="alert alert-success text-center">
            {{ session('cad_suc') }}
        </div>
    @endif


@endsection
