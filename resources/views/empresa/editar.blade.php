@extends('adminlte::page')

@section('content-title', 'Editar Serviço')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Serviço</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')

    <form action="{{route('empresa.atualizar')}}" method="post">
        {{ csrf_field()}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações do Serviço</b>
                    </h5>
                    <div class="card-body">
                        <div class="form-group col-md-4" >
                            <label for="codigo_permissao">Código</label>
                            <input type="text" name="codigo_empresa" class="form-control" value="{{$empresa->emp_id}}" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome_empresa">Nome Empresa</label>
                            <input type="text" name="nome_empresa" class="form-control" placeholder="{{$empresa->emp_nome}}" autofocus/>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="razao_social_empresa">Razão Social</label>
                            <input type="text" name="razao_social_empresa" class="form-control" placeholder="{{$empresa->emp_razao_social}}" autofocus/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contato_empresa">CNPJ Empresa</label>
                            <input type="text" name="cpnj_empresa" class="form-control" placeholder="{{$empresaFuncao->TratarCnpj2($empresa->emp_cnpj)}}" autofocus/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contato_empresa">Número Contato</label>
                            <input type="phone" name="contato_empresa" class="form-control" placeholder="{{$empresa->emp_contato}}" autofocus/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contato_empresa">Email Contrato</label>
                            <input type="email" name="email_empresa" class="form-control" placeholder="{{$empresa->emp_email}}" autofocus/>
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
