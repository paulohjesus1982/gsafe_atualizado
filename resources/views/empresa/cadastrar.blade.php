@extends('adminlte::page')

@section('content-title', 'Nova Empresa')

@section('content')
    <form action="{{route('empresa.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro da Empresa</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/empresa/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
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
                                <select class="custom-select" name="tipo_empresa">
                                    <option value="0">-- SELECIONE --</option>
                                    <option value="1">Matriz</option>
                                    <option value="2">Prestadora de Serviço</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Salvar</button>
            </div>
            <div class="col-6">
                <a style="text-decoration: none;color:white;" href="/empresa/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
