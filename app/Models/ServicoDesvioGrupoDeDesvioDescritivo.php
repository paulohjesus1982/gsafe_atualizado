<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoDesvioGrupoDeDesvioDescritivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'sdgddd_id';
    protected $table = 'servicos_desvios_grupos_de_desvios_descritivos';
    public $timestamps = false;

    protected $fillable = [
        'sdgddd_fk_ser_id',
        'sdgddd_fk_des_id',
        'sdgddd_fk_gddesv_id',
        'sdgddd_fk_gddesc_id',
        'sdgddd_criado_por',
        'sdgddd_criado_em',
        'sdgddd_atualizado_por',
        'sdgddd_atualizado_em',
    ];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'sdgddd_fk_ser_id');
    }

    public function desvio()
    {
        return $this->belongsTo(Desvio::class, 'sdgddd_fk_des_id');
    }

    public function grupoDesvio()
    {
        return $this->belongsTo(GrupoDeDesvio::class, 'sdgddd_fk_gddesv_id');
    }

    public function grupoDescritivo()
    {
        return $this->belongsTo(GrupoDeDescritivo::class, 'sdgddd_fk_gddesc_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'sdgddd_criado_por');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'sdgddd_atualizado_por');
    }
}
