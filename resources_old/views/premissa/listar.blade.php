@extends('adminlte::page')
@include('sweetalert::alert')
@section('content-title', 'Nova Equipe')

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Premissa</h3>
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
                        <th>Descrição</th>
                        <th>Permissão Vinculada</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $premissas as $premissa )
                        <tr>
                            <td id='premissa_{{$premissa->pre_id}}'>{{$premissa->pre_id}}</td>
                            <td>{{$premissa->pre_nome}}</td>
                            <td>{{$premissa->pre_descricao}}</td>
                            <td>{{$premissa->pre_fk_per_id}}</td>
                            <td>
                                <a href="/premissa/editar/{{$premissa->pre_id}}" class="navi-link">
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



