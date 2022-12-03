@extends('adminlte::page')

@section('content-title', 'Nova Empresa')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Empresa</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{route('empresa.salvar')}}" method="post">
        {{ csrf_field()}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-black">
                        <b>Cadastro da Empresa</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="nome_empresa">Nome Empresa</label>
                                <input type="text" name="nome_empresa" class="form-control" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="razao_social_empresa">Razão Social</label>
                                <input type="text" name="razao_social_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">CNPJ Empresa</label>
                                <input type="text" name="cpnj_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Número Contato</label>
                                <input type="phone" name="contato_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Email Contrato</label>
                                <input type="email" name="email_empresa" class="form-control" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Tipo Empresa</label>
                                <select name="tipo_empresa">
                                    <option value="0">-- SELECIONE --</option>
                                    <option value="1">Matriz</option>
                                    <option value="2">Parceira</option>
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

