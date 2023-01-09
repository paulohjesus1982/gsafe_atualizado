<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosDado extends Model {
    use HasFactory;

    protected $primaryKey = 'udad_id';
    public $timestamps = false;

    protected $fillable = [
        'udad_id',
        'udad_nome_completo',
        'udad_endereco',
        'udad_numero',
        'udad_cep',
        'udad_cidade',
        'udad_bairro',
        'udad_estado',
        'udad_telefone_principal',
        'udad_telefone_contato',
        'udad_registro_profissao',
        'udad_criado_em',
        'udad_atualizado_em',
        'udad_fk_usu_id',
    ];
}
