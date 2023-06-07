@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content')
  {{-- <form action="{{route('paralizacao.salvar_permissao')}}" method="post">
    {{ csrf_field()}}
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2> Listar Permissões e Premissas da Paralização</h2>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Listar Permissões e Premissas Paralização</li>
                </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Paralização</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="par_justificativa">Id Paralização</label>
                                <input type="text" name="par_id" id="par_id" class="form-control" value="{{$paralizacao->par_id}}" disabled/>
                                <input type="hidden" name="par_id" id="par_id" class="form-control" value="{{$paralizacao->par_id}}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="par_art">ART</label>
                                <input type="text" name="par_justificativa" id="par_art" class="form-control" value="{{$paralizacao->par_art}}" disabled/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="par_pet">PT</label>
                                <input type="text" name="par_pet" id="par_pet" class="form-control" value="{{$paralizacao->par_pet}}" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <h4 class="card-header text-black">
                            <b>Serviço</b>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="ser_id">Id Serviço</label>
                                <input type="text" name="ser_id" id="ser_id" class="form-control" placeholder="Serviço" value="{{$servico->ser_id}}" readonly/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ser_id">Serviço</label>
                                <input type="text" name="ser_nome" id="ser_nome" class="form-control" placeholder="Id Serviço" value="{{$servico->ser_nome}}" readonly/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ser_id">Área atuação</label>
                                <input type="text" name="ser_area_atuacao" id="ser_area_atuacao" class="form-control" placeholder="Area atuação Serviço" value="{{$servico->ser_area_atuacao}}" readonly/>
                            </div>
                        </div>
                    </div>
                    @foreach ($permissoes as  $permissao)
                        <div class="form-group col-md-12">
                            <h4 class="card-header text-black">
                                <b>Informações Permissão {{$permissao->per_id}}</b>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="par_justificativa">Id Permissão</label>
                                    <input type="text" name="per_id" id="per_id" class="form-control" value="{{$permissao->per_id}}" disabled/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="par_justificativa">Nome</label>
                                    <input type="text" name="per_nome" id="per_nome" class="form-control" value="{{$permissao->per_nome}}" disabled/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="par_justificativa">Cor</label>
                                    <input type="color" name="per_rgb" id="per_rgb" class="form-control" value="{{$permissao->per_rgb}}" disabled/>
                                </div>
                                <div class="form-group col-md-12">
                                    <h4 class="card-header text-black">
                                        <b>Informações Premissa(s)</b>
                                    </h4>
                                </div>
                                @foreach ($premissas[$permissao->per_id] as $premissa)
                                    <div class="form-group col-md-2">
                                        <label for="par_justificativa">Id Premissa</label>
                                        <input type="text" name="pre_id" id="pre_id" class="form-control" value="{{$premissa->pre_id}}" disabled/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="par_justificativa">Nome</label>
                                        <input type="text" name="pre_nome" id="pre_nome" class="form-control" value="{{$premissa->pre_nome}}" disabled/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="par_justificativa">Descrição</label>
                                        <input type="text" name="pre_descricao" id="pre_descricao" class="form-control" value="{{$premissa->pre_descricao}}" disabled/>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="par_justificativa">
                                            <br>
                                        </label>
                                        <a style="text-decoration: none;color:white;" href="/paralizacao/fechar_premissa/{{$paralizacao->par_id}}/{{$permissao->per_id}}/{{$premissa->pre_id}}">
                                            <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Fechar Premissa</button>
                                        </a>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="par_justificativa">
                                            <br>
                                        </label>
                                        <a style="text-decoration: none;color:white;" href="/paralizacao/ver_imagem_premissa/{{$paralizacao->par_id}}/{{$permissao->per_id}}/{{$premissa->pre_id}}">
                                            <button type="button" class="btn btn-danger btn-block" ><span class="fa fa-check"></span> Ver Foto Premissa</button>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <a style="text-decoration: none;color:white;" href="/paralizacao/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
  </form> --}}


<form>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Detalhes da Paralização</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
                <li class="breadcrumb-item active">Detalhes da Paralização</li>
                </ol>
            </div>
        </div>
    </div>
    <div class= "card card-info">
        <div class="card-header">
            <h3 class="card-title">Paralização {{$paralizacao->par_id}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Código PT</span>
                                    <span class="info-box-number text-center text-muted mb-0">pt - {{$paralizacao->par_pet}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Código ART</span>
                                    <span class="info-box-number text-center text-muted mb-0">art - {{$paralizacao->par_art}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Premissas</h4>
                            @foreach ($permissoes as  $permissao)
                                @foreach ($premissas[$permissao->per_id] as $premissa)
                                    <div class="post">
                                        <div>
                                            <span class="username">
                                                <a href="#">{{$permissao->per_nome}}</a>
                                            </span>
                                            <span class="description">{{$premissa->pre_nome}} - aberto {{$paralizacao->par_criado_em}} -
                                                @if($par->AchaDataFinalizacaoParalizacaoPremissas($paralizacao->par_id, $premissa->pre_id) == '')
                                                    Em Andamento
                                                @else
                                                    Fechado em {{$par->AchaDataFinalizacaoParalizacaoPremissas($paralizacao->par_id, $premissa->pre_id)}}
                                                @endif
                                             </span>
                                        </div>
                                        <p>{{$premissa->pre_descricao}}</p>
                                        @if($par->AchaImagemFinalizacaoParalizacaoPremissas($paralizacao->par_id, $premissa->pre_id) == '')
                                            {{-- <div class="col-4">
                                                <a style="text-decoration: none;color:white;" href="/paralizacao/fechar_premissa/{{$paralizacao->par_id}}/{{$permissao->per_id}}/{{$premissa->pre_id}}">
                                                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Fechar Premissa</button>
                                                </a>
                                            </div> --}}
                                            <p> 
                                                <a href="/paralizacao/fechar_premissa/{{$paralizacao->par_id}}/{{$permissao->per_id}}/{{$premissa->pre_id}}" class="link-black text-sm">
                                                    <i class="fas fa-link mr-1"></i> Fechar Premissa
                                                </a> 
                                            </p>
                                        @else
                                            <?php
                                                $anexo = $par->AchaImagemFinalizacaoParalizacaoPremissas($paralizacao->par_id, $premissa->pre_id); 
                                            ?>
                                            {{-- <img src="{{asset("$anexo")}}" class="img-responsive" style="height: 400px; width: 400px;"> --}}
                                            <p> 
                                                <a href="{{asset($anexo)}}" class="link-black text-sm">
                                                    <i class="fas fa-link mr-1"></i> Evidência
                                                </a> 
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class=""></i> {{$par->AchaEmpresaNome($paralizacao->par_fk_emp_id)}} </h3>
                    <div class="text-muted">
                        <p class="text-sm">
                            <b class="d-block">CNPJ: {{$par->AchaEmpresaCNPJ($paralizacao->par_fk_emp_id)}} </b>
                        </p>
                        {{-- <h3 class="text-primary"><i class=""></i> Serviço {{$servico->ser_id}} </h3> --}}
                        <p class="text-sm">{{$servico->ser_nome}}
                            <b class="d-block">{{$servico->ser_area_atuacao}}</b>
                        </p>
                    </div>
                    <h5 class="mt-5 text-muted">Documentos sobre a Paralização</h5>
                    <ul class="list-unstyled">
                        @if($paralizacao->par_art_img != '')
                            <?php 
                                $anexo = $paralizacao->par_art_img;
                            ?>
                            <li>
                                <a href="{{asset($anexo)}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> art - {{$paralizacao->par_art}}</a>
                            </li>
                        @else
                            <li>
                                Sem anexos de ART.
                            </li>
                        @endif
                        @if($paralizacao->par_pet_img != '')
                            <?php 
                                $anexo = $paralizacao->par_pet_img;
                            ?>
                            <li>
                                <a href="{{asset($anexo)}}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> pt - {{$paralizacao->par_pet}}</a>
                            </li>
                        @else
                            <li>
                                Sem anexos de PT.
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a style="text-decoration: none;color:white;" href="/paralizacao/listar">
                <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Voltar</button>
            </a>
        </div>
    </div>
</form>
@endsection