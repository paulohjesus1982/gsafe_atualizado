<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipe;

class Usuario extends Model {
    use HasFactory;

    protected $primaryKey = 'usu_id';

    public $timestamps = false;

    protected $fillable = [
        'usu_id',
        'usu_nome',
        'usu_email',
        'usu_senha',
        'usu_criado_em',
        'usu_atualizado_em',
        'usu_tipo_usuario'
    ];

    public function Equipes(){
        return $this->belongsToMany(Equipe::class, 'equipe_membros', 'emem_fk_usu_id', 'emem_fk_equ_id');
    }
}
