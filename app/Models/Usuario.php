<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipe;
use App\Models\UsuariosDado;

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

    protected $hidden = [
        'remember_token',
    ];

    public function Equipes() {
        return $this->belongsToMany(Equipe::class, 'equipe_membros', 'emem_fk_usu_id', 'emem_fk_equ_id');
    }

    public function DadosDoUsuario() {
        // return $this->hasManyThrough(UsuariosDado::class, Usuario::class, 'usu_id', 'udad_fk_usu_id');
        // return $this->hasMany(UsuariosDado::class, 'udad_fk_usu_id', 'usu_id');
        return $this->hasOne(UsuariosDado::class, 'udad_fk_usu_id', 'usu_id');
    }
}
