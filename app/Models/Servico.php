<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrato;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $primaryKey = 'ser_id';
    public $timestamps = false;

    protected $fillable = [
        'ser_id',
        'ser_nome'
    ];

    public function Contratos(){
        return $this->belongsToMany(Contrato::class, 'contratos_servicos', 'cser_fk_ser_id', 'cser_fk_con_id');
    }
}
