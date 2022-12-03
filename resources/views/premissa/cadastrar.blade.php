@extends('adminlte::page')

@section('content-title', 'Nova Premissa')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Permissao</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{route('premissa.salvar')}}" method="post">
        {{ csrf_field()}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-white">
                        <b>Informações Permissão</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="nome_premissa">Nome Premissa</label>
                                <input type="text" name="nome_premissa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="premissa_descricao">Descrição Premissa</label>
                                <input type="text" name="premissa_descricao" class="form-control" autofocus/>
                            </div>
                            
                            <label for="pre_fk_per_id">Vincular à Permissão</label>
                            <div class="form-select col-md-12">
                                <select name='pre_fk_per_id'>
                                    <option value='0'>-- SELECIONE --</option>
                                    @foreach ($permissoes as $permissao)
                                        <option value='{{$permissao->per_id}}'>{{$permissao->per_nome}}</option>
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

