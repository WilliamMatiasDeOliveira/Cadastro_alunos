@extends('layouts.main_layout')
@section('title', 'Login')

@section('content')
<style>
    body{
        background-color: #171923;
    }
</style>

    <div class="container">

        <div class="row text-center mt-5">
            <div class="#">
                <img src="{{asset('assets/logo2.png')}}">
            </div>
        </div>

        <div class="row text-center">

            <div class='col-6'>
                <a href="{{route('cad_aluno')}}" class="btn btn-warning form-control">
                    Cadastrar aluno
                </a>
            </div>
            <div class='col-6'>
                <a href="#" class="btn btn-primary form-control">
                    Buscar aluno
                </a>
            </div>

        </div>

    </div>

@endsection
