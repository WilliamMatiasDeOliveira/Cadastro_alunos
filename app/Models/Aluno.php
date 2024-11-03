<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome', 'data_nascimento', 'nome_mae', 'nome_pai',
        'turma', 'periodo', 'foto', 'observacao'
    ];

    public function contatos(){
        return $this->hasMany(Contato::class);
    }
}
