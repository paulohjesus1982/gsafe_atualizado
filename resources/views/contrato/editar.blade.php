@extends('adminlte::page')

@section('content-title', 'Editar Contrato')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Contrato</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')

    <form action="{{route('contrato.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Contrato</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label for="codigo_contrato">Código</label>
                                    <input type="text" name="codigo_contrato" class="form-control" value="{{$contrato->con_id}}" readonly/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome_contrato">Titulo Contrato</label>
                                    <input type="text" name="nome_contrato" class="form-control" placeholder="{{$contrato->con_nome}}" autofocus/>
                                </div>
        
                                @php 
                                $data_inicio = explode(' ', $contrato->con_data_inicio_servico);
                                $data_fim = explode(' ', $contrato->con_data_fim_servico);
                                @endphp
        
                                <div class="form-group col-md-6">
                                    <label for="data_inicio">Data Inicio</label>
                                    <input type="date" name="data_inicio" class="form-control" readonly
                                    value="@php echo $data_inicio[0]; @endphp" 
                                    autofocus/>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data_fim">Data Fim</label>
                                    <input type="date" name="data_fim" class="form-control" value="@php echo $data_fim[0]; @endphp" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="paralizacao">Paralização</label>
                                    <select class="custom-select" name="paralizacao">
                                        @foreach ( $paralizacoes as $paralizacao )
                                            <option value="{{$paralizacao->par_id}}">{{$paralizacao->par_justificativa}}<option>
                                        @endforeach
                                    </select>
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
                                            <option <?php echo $var; ?> value="{{$chave}}">{{$tipo}}<option>
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
