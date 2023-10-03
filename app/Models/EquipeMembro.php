<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeMembro extends Model
{
    use HasFactory;

    protected $primaryKey = 'emem_id';
    protected $table = 'equipes_membros';
    public $timestamps = false;

    protected $fillable = [
        'emem_id',
        'emem_fk_usu_id',
        'emem_fk_equ_id',
        'emem_status_operador',
        'emem_criado_por',
        'emem_criado_em',
        'emem_atualizado_por',
        'emem_atualizado_em',
    ];

    // Relationship with User (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'emem_criado_por', 'usu_id');
    }

    // Relationship with User (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'emem_atualizado_por', 'usu_id');
    }
}
