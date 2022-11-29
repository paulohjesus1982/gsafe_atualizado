@extends('adminlte::page')

@section('content-title', 'Editar Equipe')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Equipe</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')

    <form action="{{route('usuario.atualizar')}}" method="post">
        {{ csrf_field()}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4" >
                                <label for="codigo_equipe">Código</label>
                                <input type="text" name="codigo_equipe" class="form-control" value="{{$equipes->equ_id}}" readonly/>
                            </div>
                            <div class="form-group col-md-8" >
                                <label for="nome_equipe">Nome Equipe</label>
                                <input type="text" name="nome_equipe" class="form-control" value="" placeholder="{{$equipes->equ_nome}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
