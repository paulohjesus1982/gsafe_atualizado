<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\ParalizacaoController;
use App\Http\Controllers\PremissaController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipeMembroHistoricoController;
use App\Http\Controllers\GrupoDeDesvioController;
use App\Http\Controllers\GrupoDeDescritivoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DesvioController;

//Login
Route::get('/',           [LoginController::class, 'index'])->name('login');
Route::get('/login',      [LoginController::class, 'index'])->name('login');
Route::get('/autenticar', [LoginController::class, 'index'])->name('autenticar');
Route::post('/login',     [LoginController::class, 'autenticar'])->name('autenticar');
Route::get('/deslogar',   [LoginController::class, 'deslogar'])->name('deslogar');

Route::get('/registrar',  [RegisterController::class, 'index'])->name('registrar');
Route::post('/registrar', [RegisterController::class, 'autenticar'])->name('registrar');

Route::middleware(['VerificaSeEstouLogado'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['AcessoAdmin'])->group(function () {
        // Usuario
        Route::group(['prefix' => '/usuario'], function () {
            Route::get('/listar',      [UsuarioController::class, 'Listar'])->name('usuario.listar');
            Route::get('/cadastrar',   [UsuarioController::class, 'Cadastrar']);
            Route::get('/editar/{id}', [UsuarioController::class, 'Editar'])->name('usuario.editar');
            Route::post('/atualizar',  [UsuarioController::class, 'Atualizar'])->name('usuario.atualizar');
            Route::post('/salvar',     [UsuarioController::class, 'Salvar'])->name('usuario.salvar');
        });

        // Equipe
        Route::group(['prefix' => '/equipe'], function () {
            Route::get('/listar',                [EquipeController::class, 'Listar'])->name('equipes.listar');
            Route::get('/cadastrar',             [EquipeController::class, 'Cadastrar']);
            Route::get('/editar/{id}',           [EquipeController::class, 'Editar'])->name('equipes.editar');
            Route::get('/inativarUsuario/{id}',  [EquipeController::class, 'InativarUsuario'])->name('equipes.inativarUsuario');
            Route::get('/ativarUsuario/{id}',    [EquipeController::class, 'AtivarUsuario'])->name('equipes.ativarUsuario');
            Route::post('/salvar',               [EquipeController::class, 'Salvar'])->name('equipes.salvar');
            Route::post('/atualizar',            [EquipeController::class, 'Atualizar'])->name('equipes.atualizar');
            Route::post('/atualizarParaInativo', [EquipeController::class, 'AtualizarParaInativo'])->name('equipes.atualizarParaInativo');
            Route::post('/atualizarParaAnativo', [EquipeController::class, 'AtualizarParaAtivo'])->name('equipes.atualizarParaAtivo');
            Route::get('/listarMembros/{id}',    [EquipeController::class, 'ListarMembros'])->name('equipes.listarMembros');
        });

        // Permissao
        Route::group(['prefix' => '/permissao'], function () {
            Route::get('/listar',       [PermissaoController::class, 'Listar'])->name('permissao.listar');
            Route::get('/cadastrar',    [PermissaoController::class, 'Cadastrar']);
            Route::get('/editar/{id}',  [PermissaoController::class, 'Editar'])->name('permissao.editar');
            Route::post('/salvar',      [PermissaoController::class, 'Salvar'])->name('permissao.salvar');
            Route::post('/atualizar',   [PermissaoController::class, 'Atualizar'])->name('permissao.atualizar');
        });

        // Premissas
        Route::group(['prefix' => '/premissa'], function () {
            Route::get('/listar',       [PremissaController::class, 'Listar'])->name('premissa.listar');
            Route::get('/listar/{id}',  [PremissaController::class, 'ListarUm'])->name('premissa.listarum');
            Route::get('/editar/{id}',  [PremissaController::class, 'Editar'])->name('premissa.editar');
            Route::get('/cadastrar',    [PremissaController::class, 'Cadastrar']);
            Route::post('/salvar',      [PremissaController::class, 'Salvar'])->name('premissa.salvar');
            Route::post('/atualizar',   [PremissaController::class, 'Atualizar'])->name('premissa.atualizar');
        });

        // Serviços
        Route::group(['prefix' => '/servicos'], function () {
            Route::get('/listar',       [ServicoController::class, 'Listar'])->name('servicos.listar');
            Route::get('/cadastrar',    [ServicoController::class, 'Cadastrar']);
            Route::get('/editar/{id}',  [ServicoController::class, 'Editar'])->name('servicos.editar');
            Route::post('/salvar',      [ServicoController::class, 'Salvar'])->name('servicos.salvar');
            Route::post('/atualizar',   [ServicoController::class, 'Atualizar'])->name('servicos.atualizar');
        });

        // Empresas
        Route::group(['prefix' => '/empresa'], function () {
            Route::get('/listar',       [EmpresaController::class, 'Listar'])->name('empresa.listar');
            Route::get('/cadastrar',    [EmpresaController::class, 'Cadastrar']);
            Route::get('/editar/{id}',  [EmpresaController::class, 'Editar'])->name('empresa.editar');
            Route::post('/salvar',      [EmpresaController::class, 'Salvar'])->name('empresa.salvar');
            Route::post('/atualizar',   [EmpresaController::class, 'Atualizar'])->name('empresa.atualizar');
        });

        // Contrato
        Route::group(['prefix' => '/contrato'], function () {
            Route::get('/listar',                    [ContratoController::class, 'Listar'])->name('contrato.listar');
            Route::get('/listar_adicional/{id}',     [ContratoController::class, 'ListarAdicional'])->name('contrato.listar_adicional');
            Route::get('/cadastrar',                 [ContratoController::class, 'Cadastrar']);
            Route::get('/cadastrar_adicional/{id}',  [ContratoController::class, 'CadastrarAdicional']);
            Route::get('/cadastrar_servico/{id}',    [ContratoController::class, 'CadastrarContratoServico']);
            Route::get('/listar_servico/{id}',       [ContratoController::class, 'ListarContratoServico']);
            Route::get('/editar/{id}',               [ContratoController::class, 'Editar'])->name('contrato.editar');
            Route::post('/salvar',                   [ContratoController::class, 'Salvar'])->name('contrato.salvar');
            Route::post('/atualizar',                [ContratoController::class, 'Atualizar'])->name('contrato.atualizar');
            Route::post('/mudarstatus',              [ContratoController::class, 'MudarStatus'])->name('contrato.mudarstatus');
            Route::post('/salvar_contrato_servicos', [ContratoController::class, 'SalvarContratoServicos'])->name('contrato.salvar_contrato_servicos');
        });
    });

    // Paralizacao
    Route::group(['prefix' => '/paralizacao'], function () {
        Route::get('/listar',                                         [ParalizacaoController::class, 'Listar'])->name('paralizacao.listar');
        Route::get('/listar_permissao/{id}',                          [ParalizacaoController::class, 'ListarPermissao'])->name('paralizacao.listar_permissao');
        Route::get('/cadastrar',                                      [ParalizacaoController::class, 'Cadastrar']);
        Route::get('/cadastrar_permissao/{id}',                       [ParalizacaoController::class, 'CadastrarPermissao']);
        Route::get('/editar/{id}',                                    [ParalizacaoController::class, 'Editar'])->name('paralizacao.editar');
        Route::post('/salvar',                                        [ParalizacaoController::class, 'Salvar'])->name('paralizacao.salvar');
        Route::post('/salvar_permissao',                              [ParalizacaoController::class, 'SalvarPermissao'])->name('paralizacao.salvar_permissao');
        Route::post('/atualizar',                                     [ParalizacaoController::class, 'Atualizar'])->name('paralizacao.atualizar');
        Route::get('/mostrar',                                        [ParalizacaoController::class, 'Mostrar'])->name('paralizacao.mostrar');
        Route::get('/fechar_premissa/{id_par}/{id_per}/{id_pre}',     [ParalizacaoController::class, 'FecharPremissa'])->name('paralizacao.fechar_premissa');
        Route::post('/cadastrar_fechar_premissa',                     [ParalizacaoController::class, 'CadastrarFechamentoPremissa'])->name('paralizacao.cadastrar_fechar_premissa');
        Route::get('/ver_imagem_premissa/{id_par}/{id_per}/{id_pre}', [ParalizacaoController::class, 'VerImagemPremissa'])->name('paralizacao.ver_imagem_premissa');
    });

    // Equipes Membros Historico
    Route::group(['prefix' => '/equipes_membros_historico'], function () {
        Route::get(
            '/listar',
            [EquipeMembroHistoricoController::class, 'Listar']
        )->name('equipes_membros_historico.listar');
    });

    // Grupos De Desvios
    Route::group(['prefix' => '/grupos_de_desvios'], function () {
        Route::get(
            '/listar',
            [GrupoDeDesvioController::class, 'Listar']
        )->name('grupos_de_desvios.listar');
    });

    // Grupos De Descritivos
    Route::group(['prefix' => '/grupos_de_descritivos'], function () {
        Route::get(
            '/listar',
            [GrupoDeDescritivoController::class, 'Listar']
        )->name('grupos_de_descritivos.listar');
    });

    // Setores
    Route::group(['prefix' => '/setores'], function () {
        Route::get(
            '/listar',
            [SetorController::class, 'Listar']
        )->name('setores.listar');
    });

    // Areas
    Route::group(['prefix' => '/areas'], function () {
        Route::get(
            '/listar',
            [AreaController::class, 'Listar']
        )->name('areas.listar');
    });

    // Desvios
    Route::group(['prefix' => '/desvios'], function () {
        Route::get(
            '/listar',
            [DesvioController::class, 'Listar']
        )->name('desvios.listar');
    });
});

// Route::group(['prefix' => '/backup-paralizacao-paulo'], function () {
//     Route::get('/mostrar', [ParalizacaoController::class, 'Mostrar'])->name('paralizacao.mostrar');
// });
