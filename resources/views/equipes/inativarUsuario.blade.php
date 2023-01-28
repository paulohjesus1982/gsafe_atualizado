@extends('adminlte::page')

@section('content-title', 'Listar Equipe')

@section('content_header')
    <div class="row">
        <div class="col-11">
            <h1 class="m-0 text-dark">Equipes</h1>
        </div>
        <div class="col-1">
            <a href="/equipe/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
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
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/equipe/listar">Listar</a></li>
                <li class="breadcrumb-item active">Inativar Usuário</li>
            </ol>
        </div>
    </div>
</div>
@endsection