@extends('adminlte::page')

@section('content-title', 'Nova Equipe')

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12 card">
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
                            </td>                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection



