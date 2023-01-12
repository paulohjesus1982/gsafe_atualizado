<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratosServico extends Model {
    use HasFactory;

    protected $table = 'contratos_servicos';
    protected $primaryKey = 'cser_id';
    public $timestamps = false;

    protected $fillable = [
        'cser_id',
        'cser_fk_con_id',
        'cser_fk_ser_id',
    ];
}
