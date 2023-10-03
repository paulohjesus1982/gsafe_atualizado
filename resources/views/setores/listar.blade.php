@extends('adminlte::page')

@section('content-title', 'Listar Equipe Membro Histórico')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1 class="m-0 text-dark">Equipe Membro Histórico</h1>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Listar Equipe Membro Histórico</h2>
        </div>
        <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </div>
        <div class="col-1">
            <a href="/paralizacao/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Contrato</h3>
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
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Pertencente a Empresa</th>
                            <th>Criado Por</th>
                            <th>Criado Em</th>
                            <th>Atualizado Por</th>
                            <th>Atualizado Em</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setores as $setor)
                            <tr>
                                <td>{{ $setor->set_id }}</td>
                                <td>{{ $setor->set_nome }}</td>
                                <td>{{ $setor->empresa->emp_nome }}</td>
                                <td>{{ $setor->criadoPor->usu_nome }}</td>
                                <td>{{ $setor->set_criado_em }}</td>
                                <td>{{ $setor->atualizadoPor->usu_nome ?? 'N/A' }}</td>
                                <td>{{ $setor->set_atualizado_em ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
