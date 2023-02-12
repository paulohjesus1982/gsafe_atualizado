<?php

namespace App\Http\Controllers;

use App\Models\Paralizacao;
use App\Models\Permissao;
use App\Models\PermissoesPremissa;
use App\Models\Premissa;
use App\Models\PermissoesParalizacao;
use App\Models\ParalizacoesPremissa;
use App\Models\Empresa;
use App\Models\Servico;
use App\Models\ServicoParalizacaoPermissaoPremissa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $r)
    {
        dd(Session::get('usu_nome'));
        $total_paralizacoes = Paralizacao::count();
        $resultados = ParalizacoesPremissa::select('ppre_fk_par_id')
                ->where('ppre_status', 1)
                ->groupBy('ppre_fk_par_id', 'ppre_fk_pre_id', 'ppre_id')
                ->orderBy('ppre_id')
                ->get()->toArray();

        $array_paralizacoes_abertas = array();
        foreach($resultados as $paralizacoes){
            $par_id = $paralizacoes['ppre_fk_par_id'];

            /*Se o código da paralização não tiver dentro do array ele incluí*/
            if(!in_array($par_id, $array_paralizacoes_abertas)){
                
                array_push($array_paralizacoes_abertas, $par_id);
            }
        }
        $paralizacoes_abertas = count($array_paralizacoes_abertas);
        $porcentagem_fechadas = (($total_paralizacoes - $paralizacoes_abertas) / $total_paralizacoes) * 100;
        
        return view('home', [
            'total_paralizacoes' => $total_paralizacoes,
            'porcentagem_fechados' => round($porcentagem_fechadas, 0),
            'abertas' => $paralizacoes_abertas,
            'premissas_abertas' => count($resultados)
        ]);
    }
}
