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

    <form action="{{route('premissa.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Permissão</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="codigo_premissa">Código</label>
                                    <input type="text" name="codigo_premissa" class="form-control" readonly value="{{$premissas->pre_id}}" autofocus/>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="nome_premissa">Nome Premissa</label>
                                    <input type="text" name="nome_premissa" class="form-control" placeholder="{{$premissas->pre_nome}}" autofocus/>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="premissa_descricao">Descrição Premissa</label>
                                    <input type="text" name="premissa_descricao" class="form-control" placeholder="{{$premissas->pre_descricao}}" autofocus/>
                                </div>

                                <label for="pre_fk_per_id">Vincular à Permissão</label>
                                <div class="col-md-12">
                                    <select class="custom-select" name='pre_fk_per_id'>
                                        <option value='0'>-- SELECIONE --</option>
                                        @foreach ($permissoes as $permissao)
                                            @if ($permissao->per_id == $premissas->pre_id)
                                            <option value='{{$permissao->per_id}}' selected>{{$permissao->per_nome}}</option>
                                            @else
                                            <option value='{{$permissao->per_id}}'>{{$permissao->per_nome}}</option>
                                            @endif
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
