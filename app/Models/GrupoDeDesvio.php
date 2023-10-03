<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoDeDesvio extends Model
{
    use HasFactory;

    protected $table = 'grupos_de_desvios';
    protected $primaryKey = 'gddesv_id';
    public $timestamps = false;

    protected $fillable = [
        'gddesv_id',
        'gddesv_nome',
        'gddesv_rgb',
        'gddesv_criado_por',
        'gddesv_criado_em',
        'gddesv_atualizado_por',
        'gddesv_atualizado_em',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(Usuario::class, 'gddesv_criado_por');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(Usuario::class, 'gddesv_atualizado_por');
    }
}
