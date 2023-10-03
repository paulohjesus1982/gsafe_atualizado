<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeMembroHistorico extends Model
{
    use HasFactory;

    protected $table = 'equipes_membros_historico';
    protected $primaryKey = 'emhis_id';
    public $timestamps = false;

    protected $fillable = [
        'emhis_id',
        'emhis_acao_efetuada',
        'emhis_fk_usu_id',
        'emhis_fk_equ_id',
        'emhis_fk_usu_id_criou',
        'emhis_criado_em',
        'emhis_fk_usu_id_alterou',
        'emhis_alterado_em',
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'emhis_fk_usu_id');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'emhis_fk_equ_id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(Usuario::class, 'emhis_fk_usu_id_criou');
    }

    public function alteredByUser()
    {
        return $this->belongsTo(Usuario::class, 'emhis_fk_usu_id_alterou');
    }
}
