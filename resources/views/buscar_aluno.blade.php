@extends('layouts.main_layout')
@section('title', 'Buscar Aluno')


@section('content')

    <div class="container">

        @include('layouts.nav_bar');

        {{-- show error --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="row text-white justify-content-center">
            <div class="col-4">
                <form action="{{route('buscar_aluno_submit')}}" method="post">
                    @csrf
                    <div class='mb-5'>
                        <label for="rg"class="form-label">RG do Aluno</label>
                        <input type="text"class="form-control" name="rg">
                        {{-- show error --}}
                        @error('rg')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input type="submit"class="btn btn-primary form-control mb-5" value="BUSCAR">
                </form>

                <form action="{{route('ver_todos_alunos')}}" method="post">
                    @csrf
                    <input type="submit"class="btn btn-warning form-control" value="VER TODOS ALUNOS">
                </form>
            </div>
        </div>
    </div>

    {{-- show error --}}
    @if (session('delete'))
        <div class="alert alert-danger text-center mt-5">
            {{session('delete')}}
        </div>
    @endif


@endsection
