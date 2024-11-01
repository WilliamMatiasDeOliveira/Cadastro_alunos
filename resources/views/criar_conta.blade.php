@extends('layouts.main_layout')
@section('title', 'Criar Conta')

@section('content')

    <div class="container mt-1">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5 form">

                    <div class="text-center mb-2">
                        <h3>CRIAR CONTA</h3>
                    </div>

                    {{-- se o usuario já existir --}}
                    @if (session('user_exist'))
                        <div class="alert alert-danger text-center">
                            {{ session('user_exist') }}
                        </div>
                    @endif

                    {{-- chave de segurança invalida --}}
                    @if (session('chave_invalida'))
                        <div class="alert alert-danger text-center">
                            {{ session('chave_invalida') }}
                        </div>
                    @endif

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="{{ route('valida_conta') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Login</label>
                                    <input type="text" class="form-control" name="text_username">
                                    {{-- show error --}}
                                    @error('text_username')
                                        <div class="text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" name="text_password">
                                    {{-- show error --}}
                                    @error('text_password')
                                        <div class="text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirmar Senha</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                    {{-- show error --}}
                                    @error('confirm_password')
                                        <div class="text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="key" class="form-label">Chave de segurança</label>
                                    <input type="password" class="form-control" name="key">
                                    {{-- show error --}}
                                    @error('key')
                                        <div class="text-warning">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-warning w-100">CRIAR CONTA</button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <a href="{{ route('login') }}">Já tem uma conta ?</a>
                            </div>
                        </div>
                    </div>

                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Tag_Nativa</small>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
