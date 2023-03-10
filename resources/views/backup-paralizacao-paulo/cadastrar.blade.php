@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content-path')

@endsection

@section('content')
    <form action="{{route('paralizacao.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro da Paralização de Atividade</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Paralização Número:  000125</h3>
                  </div>
                  <form>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-4">
                        <label for="exampleInputEmail1">Número PT</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="PT">
                      </div>
                      <div class="col-md-4">
                        <label for="exampleInputPassword1">Número ART</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="ART">
                      </div>
                      <div class="col-md-2">
                        <label for="exampleInputPassword1"> Data</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="DATA">
                      </div>
                      <div class="col-md-2">
                        <label for="exampleInputPassword1"> Hora</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="HORA">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="par_fk_emp_id">Escolha a Empresa</label>
                        <select class="custom-select">
                            <option>Selecione a Empresa</option>
                            @foreach ( $empresas as $empresa )
                             <option value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}<option>
                            @endforeach
                        </select>
                      </div>
                        <br>
                        <div class="col-sm-2">
                          <label for="exampleSelectBorder">Status da Paralização</label>
                            <select class="custom-select" name="par_enum_estado_paralizacao">
                                <option value='0'>Em andamento</option>
                                <option value='1'>Liberação</option>
                            </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="par_fk_per_id">Tipos de Permissão</label>
                            <select class="custom-select" name="par_fk_per_id" id="par_fk_per_id" onchange="mostraPremissas()" style="width: 100%;">
                                <option>Tipos de Permissão</option>
                                @foreach ($permissoes as $permissao)
                                    <option value="{{$permissao->per_id}}">{{$permissao->per_nome}}<option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group" hidden id="div_premissas">
                            <label for="nome">Premissas</label>
                            <select multiple type="select" name="premissas" id="select_premissas" class="custom-select" >
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Inserir Imagens</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Insira a sua evidência</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
          </div>
    </form>
@endsection
