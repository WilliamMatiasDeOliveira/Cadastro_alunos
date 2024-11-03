<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['telefone', 'celular', 'email', 'aluno_id'];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }
}
