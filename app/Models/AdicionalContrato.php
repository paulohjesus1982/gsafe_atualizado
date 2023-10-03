<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdicionalContrato extends Model
{
    use HasFactory;

    protected $table = 'adicional_contratos';
    protected $primaryKey = 'acon_id';
    public $timestamps = false;

    protected $fillable = [
        'acon_id',
        'acon_fk_con_codigo_contrato_principal',
        'acon_criado_por',
        'acon_criado_em',
        'acon_atualizado_por',
        'acon_atualizado_em',
    ];

    // Relationship with Usuario (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'acon_criado_por', 'usu_id');
    }

    // Relationship with Usuario (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'acon_atualizado_por', 'usu_id');
    }
}
