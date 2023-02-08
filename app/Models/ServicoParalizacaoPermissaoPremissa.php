<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoParalizacaoPermissaoPremissa extends Model {
    use HasFactory;

    protected $primaryKey = 'spppre_id';
    protected $table = 'servicos_paralizacoes_permissao_premissas';
    public $timestamps = false;

    protected $fillable = [
        'spppre_id',
        'spppre_fk_par_id',
        'spppre_fk_ser_id',
        'spppre_fk_per_id',
        'spppre_fk_pre_id',
    ];
}
