<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrato;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $primaryKey = 'ser_id';
    public $timestamps = false;

    protected $fillable = [
        'ser_id',
        'ser_nome',
        'ser_area_atuacao',
        'ser_criado_em',
        'ser_atualizado_em',
        'ser_criado_por',
        'ser_atualizado_por',
    ];

    public function Contratos()
    {
        return $this->belongsToMany(Contrato::class, 'contratos_servicos', 'cser_fk_ser_id', 'cser_fk_con_id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(Usuario::class, 'ser_criado_por');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(Usuario::class, 'ser_atualizado_por');
    }
}
