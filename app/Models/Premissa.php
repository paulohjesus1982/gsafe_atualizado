<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premissa extends Model {
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
    ];
}
