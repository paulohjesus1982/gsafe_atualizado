@extends('adminlte::page')

@section('content-title', 'Editar Contrato')

@section('content')
    <form action="{{route('contrato.mudarstatus')}}" method="post">
        {{csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Contrato</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/contrato/listar">Listar</a></li>
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
                                <input type="text" name="nome_contrato" class="form-control" value="{{$contrato->con_nome}}" readonly/>
                            </div>
    
                            @php 
                                $data_inicio = explode(' ', $contrato->con_data_inicio_servico);
                                $data_fim = explode(' ', $contrato->con_data_fim_servico);
                            @endphp
    
                            <div class="form-group col-md-6">
                                <label for="data_inicio">Data Inicio</label>
                                <input type="date" name="data_inicio" class="form-control" readonly value="@php echo $data_inicio[0]; @endphp" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_fim">Data Fim</label>
                                <input type="date" name="data_fim" class="form-control" value="@php echo $data_fim[0]; @endphp" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tipo_contrato">Tipo Contrato</label>
                                <select class="custom-select" name="tipo_contrato" disabled>
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
                            <div class="form-group col-md-6">
                                <label for="par_fk_emp_id">Empresa</label>
                                <select class="custom-select" name="par_fk_emp_id" disabled>
                                    @foreach ( $empresas as $empresa )
                                        @if($empresa->emp_id == $contrato['empresas']->emp_id)
                                            <?php $selected_empresa = "selected"; ?>
                                        @endif
                                        <option <?php echo $selected_empresa; ?> value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}</option>
                                        <?php $selected_empresa = "" ?>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status_contrato">Tipo Contrato</label>
                                {{-- ver se faz sentido sempre cadastrar como principal e só fazer como subcontrato se ele cadastrar um contrato no contrato --}}
                                {{-- <input type="text" name="tipo_contrato" class="form-control" value="1" readonly/>Principal --}}
                                <select class="custom-select" name="status_contrato">
                                    <option value='1' selected>Ativo</option>
                                    <option value='2'>Inativo</option>
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
