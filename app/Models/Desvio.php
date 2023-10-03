<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desvio extends Model
{
    use HasFactory;

    protected $table = 'desvios';
    protected $primaryKey = 'des_id';
    public $timestamps = false;

    protected $fillable = [
        'des_descricao',
        'des_enum_tipo_desvio',
        'des_img_desvio_anexo',
        'des_criado_por',
        'des_criado_em',
        'des_atualizado_por',
        'des_atualizado_em',
        'des_fk_are_id',
        'des_fk_emp_id',
        'des_fk_set_id',
        'des_fk_gddesv_id',
        'des_fk_gddesc_id',
        'des_fk_ser_id',
    ];

    public function criadoPor()
    {
        return $this->belongsTo(Usuario::class, 'des_criado_por', 'usu_id');
    }

    public function atualizadoPor()
    {
        return $this->belongsTo(Usuario::class, 'des_atualizado_por', 'usu_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'des_fk_are_id', 'are_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'des_fk_emp_id', 'emp_id');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'des_fk_set_id', 'set_id');
    }

    public function grupoDeDesvio()
    {
        return $this->belongsTo(GrupoDesvio::class, 'des_fk_gddesv_id', 'gddesv_id');
    }

    public function grupoDeDescritivo()
    {
        return $this->belongsTo(GrupoDescritivo::class, 'des_fk_gddesc_id', 'gddesc_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'des_fk_ser_id', 'ser_id');
    }
}
