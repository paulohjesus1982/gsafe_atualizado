@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content')
  <form action="{{route('paralizacao.salvar_permissao')}}" method="post">
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
                                <label for="par_pet">PET</label>
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
  </form>
@endsection