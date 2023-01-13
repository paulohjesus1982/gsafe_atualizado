<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParalizacoesPremissa extends Model {
    use HasFactory;

    protected $table = 'paralizacoes_premissas';
    protected $primaryKey = 'ppre_id';
    public $timestamps = false;

    protected $fillable = [
        'ppre_id',
        'ppre_fk_par_id',
        'ppre_fk_pre_id',
        'ppre_caminho_anexo',
    ];
}
