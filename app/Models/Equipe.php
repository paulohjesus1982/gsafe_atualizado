<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Equipe extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'equ_id';

    protected $fillable = [
        'equ_id',
        'equ_nome',
        'equ_criado_em',
        'equ_atualizado_em',
        'equ_fk_usu_id_criado_por',
        'equ_atualizado_por',
    ];

    public function Membros()
    {
        return $this->belongsToMany(
            Usuario::class,
            'equipes_membros',
            'emem_fk_equ_id',
            'emem_fk_usu_id'
        )->orderByPivot('emem_fk_usu_id');
    }

    public function AchaUsuarioNome($usu_id)
    {
        $usuario = Usuario::find($usu_id);

        return $usuario->usu_nome;
    }

    public function updatedBy()
    {
        return $this->belongsTo(Usuario::class, 'equ_atualizado_por');
    }
}
