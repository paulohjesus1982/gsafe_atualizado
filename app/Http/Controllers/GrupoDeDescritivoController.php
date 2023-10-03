<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\GrupoDeDescritivo;

class GrupoDeDescritivoController extends Controller
{
    public function Listar()
    {
        $grupos_de_descritivos = GrupoDeDescritivo::with(['createdByUser', 'updatedByUser'])->get();
        return view(
            'grupos_de_descritivos.listar',
            compact('grupos_de_descritivos')
        );
    }
}
