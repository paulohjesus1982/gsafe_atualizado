<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'emp_id';
    public $timestamps = false;

    protected $fillable = [
        'emp_id',
        'emp_nome',
        'emp_cnpj',
        'emp_razao_social',
        'emp_contato',
        'emp_email',
        'emp_criado_em',
        'emp_atualizado_em',
        'emp_enum_tipo_empresa',
        'emp_fk_usu_id_atualizou',
        'emp_fk_usu_id_criado_por',
    ];

    function TratarCnpj($cnpj)
    {

        if (strlen($cnpj) > 14) {
            $retirar = array('.', '/', '-');
            return str_replace($retirar, '', $cnpj);
        }

        return $cnpj;
    }

    function TratarCnpj2($cnpj)
    {

        if (strlen($cnpj) == 14) {
            return
                substr($cnpj, 0, 2)
                . '.' .
                substr($cnpj, 2, 3)
                . '.' .
                substr($cnpj, 5, 3)
                . '/' .
                substr($cnpj, 8, 4)
                . '-' .
                substr($cnpj, 12, 2);
        }
    }

    function soNumerosFone($fone)
    {
        return str_replace(['.', '/', '-', '(', ')', ' '], '', $fone);
    }

    function numeros2Fone($fone)
    {
        if (strlen($fone) == 10) {
            return
                "(" .
                substr($fone, 0, 2)
                . ')' . " " .
                substr($fone, 3, 4)
                . '-' .
                substr($fone, 6, 7);
        } elseif (strlen($fone) == 11) {
            //Celular 55 999513228
            return
                "(" .
                substr($fone, 0, 2)
                . ')' . " " .
                substr($fone, 3, 6)
                . '-' .
                substr($fone, 7, 10);
        }
    }

    public function createdByUser()
    {
        return $this->belongsTo(Usuario::class, 'emp_fk_usu_id_criado_por');
    }
}
