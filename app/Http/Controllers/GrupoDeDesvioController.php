<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\GrupoDeDesvio;

class GrupoDeDesvioController extends Controller
{
    public function Listar()
    {
        $grupos_de_desvios = GrupoDeDesvio::with(['createdByUser', 'updatedByUser'])->get();
        return view(
            'grupos_de_desvios.listar',
            compact('grupos_de_desvios')
        );
    }
}
