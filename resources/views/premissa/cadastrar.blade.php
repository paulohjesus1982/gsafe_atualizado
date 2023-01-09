@extends('adminlte::page')

@section('content-title', 'Novo Premissa')

@section('content')
    <form action="{{route('premissa.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2>Cadastro de Premissas</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/premissa/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações da Premissa</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nome_premissa">Nome Premissa</label>
                                <input type="text" name="nome_premissa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="premissa_descricao">Descrição Premissa</label>
                                <input type="text" name="premissa_descricao" class="form-control" autofocus/>
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
                <a style="text-decoration: none;color:white;" href="/premissa/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
