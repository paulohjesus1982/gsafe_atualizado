<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;

class Contrato extends Model {
    use HasFactory;

    protected $primaryKey = 'con_id';
    public $timestamps = false;

    protected $fillable = [
        'con_id',
        'con_nome',
        'con_fk_emp_id',
        'con_data_inicio_servico',
        'con_data_fim_servico',
        'con_criado_em',
        'con_atualizado_em',
        'con_enum_tipo_contrato'
    ];

    public function Vinculo() {
        return $this->HasMany(Empresa::class, 'con_fk_emp_id', 'con_id');
    }
}
