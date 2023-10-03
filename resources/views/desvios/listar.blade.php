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
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated By</th>
                            <th>Updated At</th>
                            <th>Area</th>
                            <th>Empresa</th>
                            <th>Setor</th>
                            <th>Grupo Desvio</th>
                            <th>Grupo Descritivo</th>
                            <th>Service</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desvios as $desvio)
                            <tr>
                                <td>{{ $desvio->id }}</td>
                                <td>{{ $desvio->des_descricao }}</td>
                                <td>{{ $desvio->des_enum_tipo_desvio }}</td>
                                <td>{{ $desvio->des_img_desvio_anexo }}</td>
                                <td>{{ $desvio->createdBy->name }}</td>
                                <td>{{ $desvio->des_criado_em }}</td>
                                <td>{{ $desvio->updatedBy->name }}</td>
                                <td>{{ $desvio->des_atualizado_em }}</td>
                                <td>{{ $desvio->area->are_nome }}</td>
                                <td>{{ $desvio->empresa->emp_nome }}</td>
                                <td>{{ $desvio->setor->set_nome }}</td>
                                <td>{{ $desvio->grupoDesvio->gddesv_nome }}</td>
                                <td>{{ $desvio->grupoDescritivo->gddesc_nome }}</td>
                                <td>{{ $desvio->servico->ser_nome }}</td>
                                <td>
                                    <a href="{{ route('desvio.edit', $desvio) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('desvio.destroy', $desvio) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
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
