<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissoesParalizacao extends Model {
    use HasFactory;

    protected $primaryKey = 'ppar_id';
    protected $table = 'permissoes_paralizacoes';
    public $timestamps = false;

    protected $fillable = [
        'ppar_id',
        'ppar_fk_par_id',
        'ppar_fk_per_id',
        'ppar_status',
    ];
}
