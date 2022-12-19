<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paralizacao extends Model
{
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
        'par_art',
        'par_pet',
        'par_caminho_anexo',
        'par_fk_per_id'
    ];
}
