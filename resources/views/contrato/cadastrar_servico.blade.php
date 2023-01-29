@extends('adminlte::page')

@section('content-title', 'Cadastrar Contrato Serviço')

@section('content')
    <form action="{{route('contrato.salvar_contrato_servicos')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2>Cadastrar Serviço</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/contrato/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Casdastrar Serviços ao Contrato</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="contrato_id">Nome Contrato</label>
                                <input type="text" name="contrato_id" id="contrato_id" class="form-control" value="{{$contrato->con_id}}" disabled/>
                                <input type="hidden" name="contrato_id" id="contrato_id" class="form-control" value="{{$contrato->con_id}}"/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nome_contrato">Id Contrato</label>
                                <input type="text" name="nome_contrato" id="nome_contrato" class="form-control" value="{{$contrato->con_nome}}" disabled/>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nome">Serviços</label>
                                <select multiple type="select" name="contrato_servicos[]" id="contrato_servicos" class="custom-select">
                                    @foreach ( $servicos as $servico )
                                        <option value="{{$servico->ser_id}}">{{$servico->ser_nome}}</option>
                                    @endforeach
                                </select>
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
                <a style="text-decoration: none;color:white;" href="/contrato/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection