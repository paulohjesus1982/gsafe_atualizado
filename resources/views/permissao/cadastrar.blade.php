@extends('adminlte::page')

@section('content-title', 'Nova Permissao')

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
    <form action="{{route('permissao.salvar')}}" method="post">
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
                                <label for="cpf">Nome Permissão</label>
                                <input type="text" name="nome_permissao" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-12">
                                <div>
                                    <input type="color" name="rgb_permissao"
                                           value="#000000">
                                    <label for="rgb_permissao">Selecionar Cor</label>
                                </div>
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

