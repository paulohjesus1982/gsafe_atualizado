<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'equ_id';

    protected $fillable = [
        'equ_id',
        'equ_nome',
        'equ_criado_em',
        'equ_atualizado_em',
        'equ_fk_usu_id_atualizou',
    ];
}
