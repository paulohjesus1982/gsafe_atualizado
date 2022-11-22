<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['usu_nome' , 
    'usu_email', 
    'usu_senha', 
    'usu_criado_em', 
    'usu_atualizado_em', 
    'usu_tipo_usuario'];
}
