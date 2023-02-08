@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content')

    <form action="{{route('paralizacao.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Paralização de Atividade</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Editar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informação Paralização</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label for="codigo_contrato">Código</label>
                                    <input type="text" name="par_id" class="form-control" value="{{$paralizacao->par_id}}" readonly/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="justificativa_paralizacao">Justificativa</label>
                                    <input type="text" name="par_justificativa" class="form-control" placeholder="{{$paralizacao->par_justificativa}}" />
                                </div>
        
                                <div class="form-group col-md-6">
                                    <label for="data_inicio">Observação</label>
                                    <input type="text" name="par_observacao" class="form-control" value="" placeholder="{{$paralizacao->par_observacao}}" autofocus/>
                                </div>
        
                                <div class="form-group col-md-6">
                                    <label for="par_art">Art</label>
                                    <input type="text" name="par_art" class="form-control" value="" placeholder="{{$paralizacao->par_art}}" autofocus/>
                                </div>
        
                                <div class="form-group col-md-6">
                                    <label for="par_pet">Pet</label>
                                    <input type="text" name="par_pet" class="form-control" value="" placeholder="{{$paralizacao->par_pet}}" autofocus/>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="par_fk_emp_id">Empresa</label>
                                    <select class="custom-select" name="par_fk_emp_id">
                                        @foreach ( $empresas as $empresa )
                                            <option value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}<option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="par_fk_per_id">Permissão</label>
                                    <select class="custom-select" name="par_fk_per_id">
                                        @foreach ( $permissoes as $permissao )
                                            <option value="{{$permissao->per_id}}">{{$permissao->per_nome}}<option>    
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group col-md-6">
                                    <label for="par_enum_estado_paralizacao">Estado</label>
                                    <select class="custom-select" name="par_enum_estado_paralizacao">
                                        <option value='0'>Em andamento</option>
                                        <option value='1'>Liberação</option>
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
