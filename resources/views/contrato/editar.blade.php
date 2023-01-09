@extends('adminlte::page')

@section('content-title', 'Editar Contrato')

@section('content')
    <form action="{{route('contrato.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Contrato</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/empresa/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Editar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Contrato</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="codigo_contrato">Código</label>
                                <input type="text" name="codigo_contrato" class="form-control" value="{{$contrato->con_id}}" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome_contrato">Titulo Contrato</label>
                                <input type="text" name="nome_contrato" class="form-control" value="{{$contrato->con_nome}}" autofocus/>
                            </div>
    
                            @php 
                                $data_inicio = explode(' ', $contrato->con_data_inicio_servico);
                                $data_fim = explode(' ', $contrato->con_data_fim_servico);
                            @endphp
    
                            <div class="form-group col-md-6">
                                <label for="data_inicio">Data Inicio</label>
                                <input type="date" name="data_inicio" class="form-control" readonly value="@php echo $data_inicio[0]; @endphp" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_fim">Data Fim</label>
                                <input type="date" name="data_fim" class="form-control" value="@php echo $data_fim[0]; @endphp" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tipo_contrato">Tipo Contrato</label>
                                <select class="custom-select" name="tipo_contrato">
                                    @foreach ($tipoContrato as $chave => $tipo)
                                        @if ($chave == $contrato->con_enum_tipo_contrato && $chave != '')
                                            <?php $var = "selected"?>
                                        @elseif($chave != $contrato->con_enum_tipo_contrato && $chave != '')  
                                            <?php $var = ""?>
                                        @endif
                                            <option <?php echo $var; ?> value="{{$chave}}">{{$tipo}}</option>
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
