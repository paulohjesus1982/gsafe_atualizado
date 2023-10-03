<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';
    protected $primaryKey = 'set_id';
    public $timestamps = false;

    protected $fillable = [
        'set_nome',
        'set_fk_emp_id_pertencente',
        'set_criado_por',
        'set_criado_em',
        'set_atualizado_por',
        'set_atualizado_em',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'set_fk_emp_id_pertencente', 'emp_id');
    }

    public function criadoPor()
    {
        return $this->belongsTo(Usuario::class, 'set_criado_por', 'usu_id');
    }

    public function atualizadoPor()
    {
        return $this->belongsTo(Usuario::class, 'set_atualizado_por', 'usu_id');
    }
}
