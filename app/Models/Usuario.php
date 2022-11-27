<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    use HasFactory;

    protected $primaryKey = 'usu_id';

    protected $fillable = [
        'usu_id',
        'usu_nome',
        'usu_email',
        'usu_senha',
        'usu_criado_em',
        'usu_atualizado_em',
        'usu_tipo_usuario'
    ];
}
