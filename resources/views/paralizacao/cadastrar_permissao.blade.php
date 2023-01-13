@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content')
  <form action="{{route('paralizacao.salvar_permissao')}}" method="post">
    {{ csrf_field()}}
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2> Cadastrar Paralizações</h2>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Cadastrar Permissão na Paralização</li>
                </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Paralização</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="par_justificativa">Id Paralização</label>
                                <input type="text" name="par_id" id="par_id" class="form-control" value="{{$paralizacao->par_id}}" disabled/>
                                <input type="hidden" name="par_id" id="par_id" class="form-control" value="{{$paralizacao->par_id}}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="par_justificativa">Justificativa</label>
                                <input type="text" name="par_justificativa" id="par_justificativa" class="form-control" value="{{$paralizacao->par_justificativa}}" disabled/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="par_observacao">Observacao</label>
                                <input type="text" name="par_observacao" id="par_observacao" class="form-control" value="{{$paralizacao->par_observacao}}" disabled/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="par_observacao">Permissões</label>
                                <select multiple class="custom-select" name="permissoes[]">
                                    @foreach ( $permissoes as $permissao )
                                        <option value="{{$permissao->per_id}}">{{$permissao->per_nome}}</option>
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
                <a style="text-decoration: none;color:white;" href="/paralizacao/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
  </form>
@endsection