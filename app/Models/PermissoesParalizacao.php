<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissoesParalizacao extends Model
{
    use HasFactory;

    protected $primaryKey = 'ppar_id';
    protected $table = 'permissoes_paralizacoes';
    public $timestamps = false;

    protected $fillable = [
        'ppar_id',
        'ppar_fk_par_id',
        'ppar_fk_per_id',
        'ppar_status',
        'ppar_criado_por',
        'ppar_criado_em',
        'ppar_atualizado_por',
        'ppar_atualizado_em',
    ];

    // Relationship with User (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'ppar_criado_por', 'usu_id');
    }

    // Relationship with User (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'ppar_atualizado_por', 'usu_id');
    }
}
