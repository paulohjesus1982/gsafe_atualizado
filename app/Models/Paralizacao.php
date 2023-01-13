<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\Equipe;
use App\Models\PermissoesParalizacao;

class Paralizacao extends Model {
    use HasFactory;

    protected $primaryKey = 'par_id';
    protected $table = 'paralizacoes';
    public $timestamps = false;

    protected $fillable = [
        'par_id',
        'par_justificativa',
        'par_observacao',
        'par_enum_estado_paralizacao',
        'par_fk_emp_id',
        'par_fk_equ_id',
        'par_art',
        'par_pet',
        'par_criado_em',
        'par_atualizado_em',
    ];

    public function Empresas() {
        return $this->hasOne(Empresa::class, 'emp_id', 'par_fk_emp_id');
    }

    public function Equipes() {
        return $this->hasOne(Equipe::class, 'equ_id', 'par_fk_equ_id');
    }

    public function Permissoes() {
        return $this->hasMany(PermissoesParalizacao::class, 'ppar_fk_par_id', 'par_id');
    }
}
