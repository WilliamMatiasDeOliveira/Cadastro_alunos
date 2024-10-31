@extends('layouts.main_layout')
@section('title', 'Login')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5 form">

                    <div class="text-center mb-2">
                        <h3>LOGIN</h3>
                    </div>

                    @if (session('new_user'))
                        <div class="alert alert-success text-center">
                            {{session('new_user')}}
                        </div>
                    @endif

                    @if (session('user_invalid'))
                        <div class="alert alert-danger text-center">
                            {{session('user_invalid')}}
                        </div>
                    @endif

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="{{ route('valida_login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Login</label>
                                    <input type="text" class="form-control" name="text_username">
                                    {{-- show error --}}
                                    @error('text_username')
                                        <div class="text-warning">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" name="text_password">
                                     {{-- show error --}}
                                     @error('text_password')
                                     <div class="text-warning">
                                         {{$message}}
                                     </div>
                                 @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <a href="{{ route('criar_conta') }}">Ainda não tem uma conta ?</a>
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
