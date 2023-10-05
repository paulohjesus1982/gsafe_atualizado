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
use Illuminate\Support\Facades\DB;

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
        $total_paralizacoes = Paralizacao::count();
        $total_permissoes_paralizacoes = PermissoesParalizacao::count();
        $resultados = ParalizacoesPremissa::select('ppre_fk_par_id')
                ->where('ppre_status', 1)
                ->groupBy('ppre_fk_par_id', 'ppre_fk_pre_id', 'ppre_id')
                ->orderBy('ppre_id')
                ->get()->toArray();
                
        $resultados_paralizacoes_diarias = $results = DB::table('paralizacoes_premissas as pp')
        ->select('pp.ppre_fk_par_id', 'p2.par_art', 'p2.par_pet', 'p.pre_nome', 'e.emp_nome', 'pp.ppre_status')
        ->join('premissas as p', 'p.pre_id', '=', 'pp.ppre_fk_pre_id')
        ->join('paralizacoes as p2', 'p2.par_id', '=', 'pp.ppre_fk_par_id')
        ->join('permissoes_premissas as pp2', 'pp2.ppre_fk_pre_id', '=', 'pp.ppre_fk_pre_id')
        ->leftJoin('permissoes as p3', 'p3.per_id', '=', 'pp.ppre_fk_pre_id')
        ->join('empresas as e', 'e.emp_id', '=', 'p2.par_fk_emp_id')
        ->get();


        $resultados_ranking_permissoes = $results = DB::table('permissoes_paralizacoes as pp')
        ->join('permissoes as p', 'p.per_id', '=', 'pp.ppar_fk_per_id')
        ->select('p.per_nome', DB::raw('count(pp.ppar_fk_per_id) as quantidade'))
        ->groupBy('p.per_nome')
        ->orderByDesc('quantidade')
        ->get();

        $array_paralizacoes_abertas = array();
        foreach($resultados as $paralizacoes){
            $par_id = $paralizacoes['ppre_fk_par_id'];

            /*Se o código da paralização não tiver dentro do array ele incluí*/
            if(!in_array($par_id, $array_paralizacoes_abertas)){
                
                array_push($array_paralizacoes_abertas, $par_id);
            }
        }
        $paralizacoes_abertas = count($array_paralizacoes_abertas);

        if($total_paralizacoes > 0){
            $porcentagem_fechadas = (($total_paralizacoes - $paralizacoes_abertas) / $total_paralizacoes) * 100;
        }else{
            $porcentagem_fechadas = 0;
        }
        
        return view('home', [
            'total_paralizacoes' => $total_paralizacoes,
            'porcentagem_fechados' => round($porcentagem_fechadas, 0),
            'abertas' => $paralizacoes_abertas,
            'premissas_abertas' => count($resultados),
            'paralizacoes_diarias' => $resultados_paralizacoes_diarias,
            'ranking_permissoes' => $resultados_ranking_permissoes,
            'total_permissoes_paralizacoes' => $total_permissoes_paralizacoes
        ]);
    }
}
