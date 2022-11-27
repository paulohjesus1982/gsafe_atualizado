@extends('adminlte::page')

@section('content-title', 'Nova Equipe')

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Usuarios</h3>
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
                    @foreach ( $usuarios as $usuario )
                        <tr>
                            <td>{{$usuario->usu_id}}</td>
                            <td>{{$usuario->usu_nome}}</td>
                            <td>{{$usuario->usu_criado_em}}</td>
                            <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                                  Editar
                                </button>
                            </td>                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection