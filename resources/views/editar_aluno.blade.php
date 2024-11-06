@extends('layouts.main_layout')
@section('title', 'Editar')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-8">

                @include('layouts.nav_bar')

                <div class="row text-center">
                    <div>
                        <style>img{border-radius: 50px;width: 90px}</style>
                        <img src="{{asset('img/'.$aluno->foto)}}" class="img-fluid w-10">
                    </div>
                </div>

                <div class="card p-3 form">
                    <style>
                        .form {
                            background-color: #1C1C1C;
                            color: white;
                        }
                    </style>
                    <!-- form -->
                    <form action="{{ route('editar_aluno_submit', ['id'=>$aluno->id]) }}" method="post"enctype='multipart/form-data'>
                        @csrf


                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="nome" class="form-label">Nome do aluno</label>
                                <input type="text" class="form-control" name="nome"value="{{$aluno->nome}}">
                                {{-- show error --}}
                                @error('nome')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control"
                                    name="data_nascimento"value="{{$aluno->data_nascimento}}">
                                {{-- show error --}}
                                @error('data_nascimento')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="telefone" class="form-label">Telefone do responsável</label>
                                <input type="text" class="form-control" name="telefone"value="{{$aluno->contatos->first()->telefone}}">
                                {{-- show error --}}
                                @error('telefone')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="celular" class="form-label">Celular do responsável</label>
                                <input type="text" class="form-control" name="celular"value="{{$aluno->contatos->first()->celular}}">
                                {{-- show error --}}
                                @error('celular')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="rg" class="form-label">RG</label>
                                <input type="text" class="form-control" name="rg"value="{{$aluno->rg}}">
                                {{-- show error --}}
                                @error('rg')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>

                        <div class="row mb-3">

                            <div class="col-4">
                                <label for="nome_mae" class="form-label">Nome da mãe</label>
                                <input type="text" class="form-control" name="nome_mae"value="{{$aluno->nome_mae}}">
                                {{-- show error --}}
                                @error('nome_mae')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="nome_pai" class="form-label">Nome do pai</label>
                                <input type="text" class="form-control" name="nome_pai"value="{{$aluno->nome_pai}}">
                                {{-- show error --}}
                                @error('nome_pai')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="email" class="form-label">E-mail para contato</label>
                                <input type="email" class="form-control" name="email"value="{{$aluno->contatos->first()->email}}">
                                {{-- show error --}}
                                @error('email')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-1">
                                <label for="turma" class="form-label">Turma</label>
                                <input type="text" class="form-control" name="turma"value="{{$aluno->turma}}">
                                {{-- show error --}}
                                @error('turma')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-1">
                                <label for="periodo" class="form-label">Periodo</label>
                                <input type="text" class="form-control" name="periodo"value="{{$aluno->periodo}}">
                                {{-- show error --}}
                                @error('periodo')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto"value="{{$aluno->foto}}">
                                {{-- show error --}}
                                @error('foto')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="observacao" class="form-label">Observação</label>
                                <input type="text" class="form-control"
                                    name="observacao"value="{{$aluno->observacao}}">
                                {{-- show error --}}
                                @error('observacao')
                                    <div class="text-warning">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        {{-- este trecho eu tenho que colocar dentro de um form --}}
                        <div class="row justify-content-center mb-5">
                            <div class="col-8">
                                <button type="submit" class="btn btn-warning w-100">ATUALIZAR</button>
                            </div>
                        </div>

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

