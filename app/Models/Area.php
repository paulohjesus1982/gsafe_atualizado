<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $primaryKey = 'are_id';
    public $timestamps = false;

    protected $fillable = [
        'are_nome',
        'are_criado_por',
        'are_criado_em',
        'are_atualizado_por',
        'are_atualizado_em',
    ];

    public function criadoPor()
    {
        return $this->belongsTo(Usuario::class, 'are_criado_por', 'usu_id');
    }

    public function atualizadoPor()
    {
        return $this->belongsTo(Usuario::class, 'are_atualizado_por', 'usu_id');
    }
}
