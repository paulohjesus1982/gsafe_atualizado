@extends('adminlte::page')

@section('content-title', 'Novo Contrato de Adicional')

@section('content')
<form action="{{route('contrato.salvar')}}" method="post">
    {{ csrf_field()}}


    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2> Cadastrar Contrato</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/contrato/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Cadastrar Contrato Adicional</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <h5 class="card-header text-black">
                    <b>Informações Contrato</b>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id_contrato_original">Id Contrato</label>
                            <input type="text" name="id_contrato_original" class="form-control" value="{{$contrato_principal->con_id}}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome_contrato_original">Titulo Contrato</label>
                            <input type="text" name="nome_contrato_original" class="form-control" value="{{$contrato_principal->con_nome}}" readonly />
                        </div>
                    </div>
                </div>    
                <h5 class="card-header text-black">
                    <b>Informações Contrato Adicional</b>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome_contrato">Titulo</label>
                            <input type="text" name="nome_contrato" class="form-control" placeholder="" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="data_inicio">Data Inicio</label>
                            <input type="date" name="data_inicio" class="form-control" value="" autofocus />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="data_fim">Data Fim</label>
                            <input type="date" name="data_fim" class="form-control" value="" autofocus />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="empresa">Empresa</label>
                            <select class="custom-select" name="empresa" disabled>
                                @foreach ( $empresas as $empresa )
                                    @if($empresa->emp_id == $contrato_principal->con_fk_emp_id)
                                        <option value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}</option>
                                        <input type="hidden" name="empresa" class="form-control" value="{{$empresa->emp_id}}" />
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipo_contrato">Tipo Contrato</label>
                            <select class="custom-select" name="tipo_contrato" id="tipo_contrato" disabled>
                                <option value='1'>Principal</option>
                                <option value='2'selected>Adicional de Contrato</option>
                            </select>
                            <input type="hidden" name="tipo_contrato" class="form-control" value="2" />
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