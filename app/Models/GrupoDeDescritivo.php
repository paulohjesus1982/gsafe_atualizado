<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoDeDescritivo extends Model
{
    use HasFactory;

    protected $table = 'grupos_de_descritivos';
    protected $primaryKey = 'gddesc_id';
    public $timestamps = false;

    protected $fillable = [
        'gddesc_id',
        'gddesc_nome',
        'gddesc_descricao',
        'gddesc_criado_por',
        'gddesc_criado_em',
        'gddesc_atualizado_por',
        'gddesc_atualizado_em',
    ];
}
