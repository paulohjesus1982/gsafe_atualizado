@extends('adminlte::page')

@section('content-title', 'Listar Equipe')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1 class="m-0 text-dark">Permissão</h1>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Cadastro de Permissão</h2>
        </div>
        <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </div>
        <div class="col-1">
            <a href="/permissao/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Permissão</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Cor</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $permissoes as $permissao )
                            <tr>
                                <td id='equipe_id'>{{$permissao->per_id}}</td>
                                <td>{{$permissao->per_nome}}</td>
                                <td>
                                    <input type="color" name="rgb_permissao" value="{{$permissao->per_rgb}}" disabled>
                                    <label for="rgb_permissao"></label>
                                </td>
                                <td>
                                    <a href="/permissao/editar/{{$permissao->per_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Editar
                                            </span>
                                        </span>
                                    </a>
                                </td>                           
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
