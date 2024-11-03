@extends('layouts.main_layout')
@section('title', 'Login')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-8">

                <div class="card p-3 form">

                    @include('layouts.nav_bar')

                    <div class="row">
                        <div class="text-center mb-4">
                            <h3>CADASTRO DE ALUNOS</h3>
                        </div>
                    </div>

                    <!-- form -->
                    <form action="{{ route('cad_aluno_submit') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="nome" class="form-label">Nome do aluno</label>
                                <input type="text" class="form-control" name="nome"value="{{old('nome')}}">
                                {{-- show error --}}
                                @error('nome')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento"value="{{old('data_nascimento')}}">
                                {{-- show error --}}
                                @error('data_nascimento')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="telefone" class="form-label">Telefone do responsável</label>
                                <input type="text" class="form-control" name="telefone"value="{{old('telefone')}}">
                                {{-- show error --}}
                                @error('telefone')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="celular" class="form-label">Celular do responsável</label>
                                <input type="text" class="form-control" name="celular"value="{{old('celular')}}">
                                {{-- show error --}}
                                @error('celular')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="periodo" class="form-label">Periodo</label>
                                <input type="text" class="form-control" name="periodo"value="{{old('periodo')}}">
                                {{-- show error --}}
                                @error('periodo')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-4">
                                <label for="nome_mae" class="form-label">Nome da mãe</label>
                                <input type="text" class="form-control" name="nome_mae"value="{{old('nome_mae')}}">
                                {{-- show error --}}
                                @error('nome_mae')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="nome_pai" class="form-label">Nome do pai</label>
                                <input type="text" class="form-control" name="nome_pai"value="{{old('nome_pai')}}">
                                {{-- show error --}}
                                @error('nome_pai')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="email" class="form-label">E-mail para contato</label>
                                <input type="email" class="form-control" name="email"value="{{old('email')}}">
                                {{-- show error --}}
                                @error('email')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-2">
                                <label for="turma" class="form-label">Turma</label>
                                <input type="text" class="form-control" name="turma"value="{{old('turma')}}">
                                {{-- show error --}}
                                @error('turma')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto"value="{{old('foto')}}">
                                {{-- show error --}}
                                @error('foto')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="observacao" class="form-label">Observação</label>
                                <input type="text" class="form-control" name="observacao"value="{{old('observacao')}}">
                                {{-- show error --}}
                                @error('observacao')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row justify-content-center mb-5">
                            <div class="col-8">
                                <button type="submit" class="btn btn-danger w-100">CADASTRAR</button>
                            </div>
                        </div>

                        @if (session('cad_fail'))
                            <div class="alert alert-danger text-center">
                                {{ session('cad_fail') }}
                            </div>
                        @endif

                        @if (session('cad_suc'))
                            <div class="alert alert-success text-center">
                                {{ session('cad_suc') }}
                            </div>
                        @endif


                    </form>


                    <!-- copy -->
                    <div class="text-center text-secondary mt-5">
                        <small>&copy; <?= date('Y') ?> Tag_Nativa</small>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
