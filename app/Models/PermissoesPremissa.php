<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Premissa;

class PermissoesPremissa extends Model
{
    use HasFactory;

    protected $primaryKey = 'ppre_id';
    protected $table = 'permissoes_premissas';
    public $timestamps = false;

    protected $fillable = [
        'ppre_id',
        'ppre_fk_per_id',
        'ppre_fk_pre_id',
        'ppre_criado_por',
        'ppre_criado_em',
        'ppre_atualizado_por',
        'ppre_atualizado_em',
    ];

    public function Premissas()
    {
        return $this->hasMany(Premissa::class, 'pre_id', 'ppre_fk_pre_id');
    }

    // Relationship with Usuario (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'ppre_criado_por', 'usu_id');
    }

    // Relationship with Usuario (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'ppre_atualizado_por', 'usu_id');
    }
}
