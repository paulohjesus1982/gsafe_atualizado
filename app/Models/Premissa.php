<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premissa extends Model
{
    use HasFactory;

    protected $table = 'premissas';
    protected $primaryKey = 'pre_id';
    public $timestamps = false;

    protected $fillable = [
        'pre_id',
        'pre_nome',
        'pre_descricao',
        'pre_criado_em',
        'pre_atualizado_em',
        'pre_criado_por',
        'pre_atualizado_por',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(Usuario::class, 'pre_criado_por');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(Usuario::class, 'pre_atualizado_por');
    }
}
