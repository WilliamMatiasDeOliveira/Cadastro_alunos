<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function valida_login(Request $request){
        $request->validate(
            // rules
            [
                'text_username'=>'required',
                'text_password'=>'required|min:6|max:16'
            ],
            // messages
            [
                'text_username.required'=>'Preencha este campo',

                'text_password.required'=>'Preencha este campo',
                'text_password.min'=>'A senha deve ter no minimo :min digitos',
                'text_password.max'=>'A senha deve ter no maximo :max digitos',
            ]
        );

        $login = $request->input('text_username');
        $senha = $request->input('text_password');

        $users = User::all();

        foreach($users as $user){
            if($user->login === $login && Hash::check($senha, $user->senha)){
                session(['user'=>$login]);
                return redirect()->route('home');
            }else{
                return redirect()->route('login')
                        ->with('user_invalid', 'Usuario ou Senha inválidos');
            }
        }
    }

    public function valida_conta(Request $request){
        $request->validate(
            // rules
            [
                'text_username'=>'required',
                'text_password'=>'required|min:6|max:16',
                'confirm_password'=>'required|min:6|max:16|same:text_password',
                'key'=>'required'
            ],
            // messages
            [
                'text_username.required'=>'Preencha este campo',

                'text_password.required'=>'Preencha este campo',
                'text_password.min'=>'A senha deve ter no minimo :min digitos',
                'text_password.max'=>'A senha deve ter no maximo :max digitos',

                'confirm_password.required'=>'Preencha este campo',
                'confirm_password.min'=>'A senha deve ter no minimo :min digitos',
                'confirm_password.max'=>'A senha deve ter no maximo :max digitos',
                'confirm_password.same'=>'As senhas devem ser iguais',

                'key.required'=>'Este campo é obrigatório'
            ]
        );

        $login = $request->input('text_username');
        $senha = $request->input('text_password');
        $key = $request->input('key');

        // verifica se este usuario já possui uma conta
        $user_verify = User::where('login', $login)->first();


        if($user_verify){
            return redirect()->route('criar_conta')
                        ->with('user_exist', 'Este usuário já existe');
        }

        // verifica se a chave de segurança foi digitada corretamente
        $key_verify = Key::first();
        if(!$key_verify || !Hash::check($key, $key_verify->key)){
            return redirect()->route('criar_conta')
                    ->with('chave_invalida', 'Chave de segurança inválida');
        }

        // criptografando a senha
        $senha = Hash::make($senha);

        $new_user = new User();
        $new_user->login = $login;
        $new_user->senha = $senha;
        $new_user->created_at = now();

        // salvando novo usuario no bd
        $new_user->save();

        return redirect()->route('login')
                ->with('new_user', 'Usuário criado com sucesso');

    }

    public function logout(Request $request){
        $request->session()->invalidate(); // Invalida a sessão
        $request->session()->regenerateToken(); // Regenera o token CSRF para maior segurança

        return redirect()->route('login'); // Redireciona para a página de login
    }
}
