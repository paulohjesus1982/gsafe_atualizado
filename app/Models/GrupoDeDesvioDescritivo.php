<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposDeDesviosDescritivos extends Model
{
    use HasFactory;

    protected $table = 'grupos_de_desvios_descritivos';
    protected $primaryKey = 'gddesvdesc_id';
    public $timestamps = false;

    protected $fillable = [
        'gddesvdesc_fk_per_id',
        'gddesvdesc_fk_pre_id',
        'gddesvdesc_criado_por',
        'gddesvdesc_criado_em',
        'gddesvdesc_atualizado_por',
        'gddesvdesc_atualizado_em',
    ];

    public function permissao()
    {
        return $this->belongsTo(Permissao::class, 'gddesvdesc_fk_per_id');
    }

    public function premissa()
    {
        return $this->belongsTo(Premissa::class, 'gddesvdesc_fk_pre_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Usuario::class, 'gddesvdesc_criado_por');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'gddesvdesc_atualizado_por');
    }
}
