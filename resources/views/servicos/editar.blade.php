@extends('adminlte::page')

@section('content-title', 'Editar Serviço')

@section('content')

    <form action="{{route('servicos.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Editar Serviço</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/servicos/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Permissão</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <label for="codigo_permissao">Código</label>
                                    <input type="text" name="codigo_servico" class="form-control" value="{{$servico->ser_id}}" readonly/>
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="nome_permissao">Nome</label>
                                    <input type="text" name="nome_servico" class="form-control" value="{{$servico->ser_nome}}" />
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Salvar</button>
            </div>
            <div class="col-6">
                <a style="text-decoration: none;color:white;" href="/servicos/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
