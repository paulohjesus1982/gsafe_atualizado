<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratosServico extends Model
{
    use HasFactory;

    protected $table = 'contratos_servicos';
    protected $primaryKey = 'cser_id';
    public $timestamps = false;

    protected $fillable = [
        'cser_id',
        'cser_fk_con_id',
        'cser_fk_ser_id',
        'cser_criado_por',
        'cser_criado_em',
        'cser_atualizado_por',
        'cser_atualizado_em',
    ];

    // Relationship with Usario (created by)
    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'cser_criado_por', 'usu_id');
    }

    // Relationship with Usario (updated by)
    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'cser_atualizado_por', 'usu_id');
    }
}
