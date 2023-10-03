<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParalizacoesPremissa extends Model
{
    use HasFactory;

    protected $table = 'paralizacoes_premissas';
    protected $primaryKey = 'ppre_id';
    public $timestamps = false;

    protected $fillable = [
        'ppre_id',
        'ppre_fk_par_id',
        'ppre_fk_pre_id',
        'ppre_caminho_anexo',
        'ppre_status',
        'ppre_finalizado_em',
        'ppre_finalizado_por',
        'ppre_criado_por',
        'ppre_criado_em',
        'ppre_atualizado_por',
        'ppre_atualizado_em',
    ];

    // Relationship with User (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'ppre_criado_por', 'usu_id');
    }

    // Relationship with User (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'ppre_atualizado_por', 'usu_id');
    }
}
