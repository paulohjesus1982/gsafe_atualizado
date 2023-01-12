@extends('adminlte::page')

@section('content-title', 'Listar Serviço')

@section('content')
{{ csrf_field()}}

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Listar Contratos Adicionais</h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/contrato/listar">Listar Contratos</a></li>
                <li class="breadcrumb-item active">Listar Contrato e Adicionais</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="row col-md-12">
        <div class="col-md-12">
            <div class="card card-primary">
                <h5 class="card-header text-black">
                    <b>Informações Contrato Principal</b>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id_contrato_original">Id Contrato</label>
                            <input type="text" name="id_contrato_original" class="form-control" value="{{$contrato->con_id}}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome_contrato_original">Titulo Contrato</label>
                            <input type="text" name="nome_contrato_original" class="form-control" value="{{$contrato->con_nome}}" />
                        </div>

                        @php 
                            $data_inicio = explode(' ', $contrato->con_data_inicio_servico);
                            $data_fim = explode(' ', $contrato->con_data_fim_servico);

                        @endphp

                        <div class="form-group col-md-6">
                            <label for="data_inicio">Data Inicio</label>
                            <input type="date" name="data_inicio" class="form-control" value="@php echo $data_inicio[0]; @endphp" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="data_fim">Data Fim</label>
                            <input type="date" name="data_fim" class="form-control" value="@php echo $data_fim[0]; @endphp" />
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="empresa">Empresa</label>
                            <input type="text" name="empresa" class="form-control" value="{{$contrato['empresa']->emp_nome}}" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tipo_contrato">Tipo Contrato</label>
                            <?php 
                                if($contrato->con_enum_tipo_contrato == 1){
                                    $tipo_contrato = "Principal";
                                }else{
                                    $tipo_contrato = "Contrato Adicional";
                                }
                            ?>
                            <input type="text" name="tipo_contrato" class="form-control" value="{{$tipo_contrato}}" />
                        </div>
                    </div>
                </div>
            </div>
                @foreach ($contratos_adicionais as $contrato_adicional)
                    <div class="card card-primary">
                        <h5 class="card-header text-black">
                            <b>Informações Contrato Adicional {{$contrato_adicional['contrato']->con_id}} </b>
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="id_contrato_original">Id Contrato</label>
                                    <input type="text" name="id_contrato_original" class="form-control" value="{{$contrato_adicional['contrato']->con_id}}" readonly />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nome_contrato_original">Titulo Contrato</label>
                                    <input type="text" name="nome_contrato_original" class="form-control" value="{{$contrato_adicional['contrato']->con_nome}}" />
                                </div>
                                
                                @php 
                                    $data_inicio = explode(' ', $contrato_adicional['contrato']->con_data_inicio_servico);
                                    $data_fim = explode(' ', $contrato_adicional['contrato']->con_data_fim_servico);

                                @endphp

                                <div class="form-group col-md-6">
                                    <label for="data_inicio">Data Inicio</label>
                                    <input type="date" name="data_inicio" class="form-control" value="@php echo $data_inicio[0]; @endphp" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="data_fim">Data Fim</label>
                                    <input type="date" name="data_fim" class="form-control" value="@php echo $data_fim[0]; @endphp" />
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="empresa">Empresa</label>
                                    <input type="text" name="empresa" class="form-control" value="{{$contrato_adicional['empresa']->emp_nome}}" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tipo_contrato">Tipo Contrato</label>
                                    <?php 
                                        if($contrato_adicional['contrato']->con_enum_tipo_contrato == 1){
                                            $tipo_contrato_adicional = "Principal";
                                        }else{
                                            $tipo_contrato_adicional = "Contrato Adicional";
                                        }
                                    ?>
                                    <input type="text" name="tipo_contrato" class="form-control" value="{{$tipo_contrato_adicional}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a style="text-decoration: none;color:white;" href="/contrato/listar">
            <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Voltar</button>
        </a>
    </div>
</div>
@endsection
