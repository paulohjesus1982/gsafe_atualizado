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
    <form action="{{route('equipes.salvar')}}" method="post">
        {{ csrf_field()}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-white">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="form-group col-md-12">
                                <label for="nome">Membros</label>
                                <select type="select" name="membros_equipe" id="select_membros" class="form-control">
                                    <option value="0">-- SELECIONE --</option>
                                    @foreach ( $equipes as $equipe )
                                    <option value="{{$equipe->equ_id}}">{{$equipe->equ_nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12" >
                                <label for="cpf">Nome Equipe</label>
                                <input type="text" name="nome_equipe" class="form-control" value="" />
                            </div>
                            <div class="form-group col-md-12" >
                                <label for="cpf">Membros Equipe</label>
                                <select multiple type="select" name="nome_equipe" class="form-multi-select" value="">
                                    @foreach ( $membros as $membro )
                                    <option value="{{$membro->usu_id}}">{{$membro->usu_nome}}</option>
                                    @endforeach
                                </select>
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
