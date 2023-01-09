@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Paralização</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')

    <form action="{{route('paralizacao.atualizar')}}" method="post">
        {{ csrf_field()}}

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
                                        <option value='1'>Em andamento</option>
                                        <option value='2'>Liberação</option>
                                    </select>
                                </div>
                                
                                {{-- <div class="form-group col-md-6">
                                    <label for="par_caminho_anexo">Arquivo</label>
                                    <input type="file" name="par_caminho_anexo" class="form-control" value="" autofocus/>
                                </div> --}}
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