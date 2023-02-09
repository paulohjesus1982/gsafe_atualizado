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
        'par_enum_estado_paralizacao',
        'par_fk_emp_id',
        'par_art',
        'par_pet',
        'par_criado_em',
        'par_atualizado_em',
        'par_art_img',
        'par_pet_img',
    ];

    public function Empresas() {
        return $this->hasOne(Empresa::class, 'emp_id', 'par_fk_emp_id');
    }


    public function Permissoes() {
        return $this->hasMany(PermissoesParalizacao::class, 'ppar_fk_par_id', 'par_id');
    }

    public function AchaEmpresaNome($emp_id) {
        $empresa = Empresa::find($emp_id);

        return $empresa->emp_nome;
    }

    public function AchaEmpresaCNPJ($emp_id) {
        $empresa = Empresa::find($emp_id);

        return $empresa->emp_cnpj;
    }

    public function AchaEquipeNome($equ_id) {
        $equipe = Equipe::find($equ_id);

        return $equipe->equ_nome;
    }

    public function AchaDataFinalizacaoParalizacaoPremissas($par_id, $pre_id) {
        $paralizacao_premissa = ParalizacoesPremissa::where('ppre_fk_par_id', $par_id)->where('ppre_fk_pre_id', $pre_id)->get();

        return $paralizacao_premissa[0]->ppre_finalizado_em;
    }

    public function AchaImagemFinalizacaoParalizacaoPremissas($par_id, $pre_id) {
        $paralizacao_premissa = ParalizacoesPremissa::where('ppre_fk_par_id', $par_id)->where('ppre_fk_pre_id', $pre_id)->get();

        return $paralizacao_premissa[0]->ppre_caminho_anexo;
    }
}
