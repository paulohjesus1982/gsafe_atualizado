@extends('adminlte::page')

@section('content-title', 'Listar Serviço')

@section('content_header')
    <div class="row">
        <div class="col-10">
            <h1 class="m-0 text-dark">Serviço</h1>
        </div>
        <div class="col-1">
            <a href="/servicos/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Serviço</h3>
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
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $servicos as $servico )
                        <tr>
                            <td id='equipe_{{$servico->ser_id}}'>{{$servico->ser_id}}</td>
                            <td>{{$servico->ser_nome}}</td>
                            <td>
                                <a href="/servicos/editar/{{$servico->ser_id}}" class="navi-link">
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