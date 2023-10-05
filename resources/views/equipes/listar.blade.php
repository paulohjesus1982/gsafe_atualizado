@extends('adminlte::page')

@section('content-title', 'Listar Equipe')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1 class="m-0 text-dark">Equipes</h1>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Listar Equipes</h2>
        </div>
        <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </div>
        <div class="col-sm-1">
            <a href="/equipe/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Equipes</h3>
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
                            <th>Data Criação</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $equipes as $equipe )
                            <tr>
                                <td id='equipe_id'>{{$equipe->equ_id}}</td>
                                <td>{{$equipe->equ_nome}}</td>
                                <td>{{$equipe->equ_criado_em}}</td>
                                <td>
                                    <a href="/equipe/editar/{{$equipe->equ_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Editar
                                            </span>
                                        </span>
                                    </a>
                                    | 
                                    <a href="/equipe/listarMembros/{{$equipe->equ_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Listar Membros
                                            </span>
                                        </span>
                                    </a>
                                    | 
                                    <a href="/equipe/inativarUsuario/{{$equipe->equ_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Inativar Usuário
                                            </span>
                                        </span>
                                    </a>
                                    | 
                                    <a href="/equipe/ativarUsuario/{{$equipe->equ_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Ativar Usuário
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
