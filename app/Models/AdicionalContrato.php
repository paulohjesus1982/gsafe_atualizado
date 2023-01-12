<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdicionalContrato extends Model {
    use HasFactory;

    protected $table = 'adicional_contratos';
    protected $primaryKey = 'acon_id';
    public $timestamps = false;

    protected $fillable = [
        'acon_id',
        'acon_fk_con_codigo_contrato_principal',
        'acon_fk_con_codigo_contrato_adicional',
    ];
}
