@extends('adminlte::page')

@section('content-title', 'Cadastrar Paralização')

@section('content-path')

@endsection

@section('content')
  <form action="{{route('paralizacao.salvar')}}" method="post">
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
                  <li class="breadcrumb-item active">Cadastrar</li>
              </ol>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <div class="card card-primary">
              <h5 class="card-header text-black">
                  <b>Informações Paralizações</b>
              </h5>
              <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                          <label for="par_justificativa">Justificativa</label>
                          <input type="text" name="par_justificativa" id="par_justificativa" class="form-control {{$errors->has('par_justificativa') ? 'is-invalid' : ''}}" placeholder="Justificativa da Paralização" value="{{old('par_justificativa')}}"/>
                          @if($errors->has('par_justificativa'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_justificativa')}}
                              </div>
                          @endif
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_observacao">Observacao</label>
                          <input type="text" name="par_observacao" id="par_observacao" class="form-control {{$errors->has('par_observacao') ? 'is-invalid' : ''}}" placeholder="Observação da Paralização" value="{{old('par_observacao')}}"/>
                          @if($errors->has('par_observacao'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_observacao')}}
                              </div>
                          @endif
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_art">ART</label>
                          <input type="text" name="par_art" id="par_art" class="form-control {{$errors->has('par_art') ? 'is-invalid' : ''}}" placeholder="PAR" value="{{old('par_art')}}"/>
                          @if($errors->has('par_art'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_art')}}
                              </div>
                          @endif
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_pet">PET</label>
                          <input type="text" name="par_pet" id="par_pet" class="form-control {{$errors->has('par_pet') ? 'is-invalid' : ''}}" placeholder="PET" value="{{old('par_pet')}}"/>
                          @if($errors->has('par_pet'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_pet')}}
                              </div>
                          @endif
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_enum_estado_paralizacao">Estado Paralização</label>
                          <select class="custom-select" name="par_enum_estado_paralizacao">
                              <option value="0">-- SELECIONE --</option>
                              <option value="1">Em andamento</option>
                              <option value="2">Liberação</option>
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_fk_emp_id">Empresa</label>
                          <select class="custom-select" name="par_fk_emp_id">
                              @foreach ( $empresas as $empresa )
                                  <option value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_fk_equ_id">Equipe</label>
                          <select class="custom-select" name="par_fk_equ_id">
                              @foreach ( $equipes as $equipe )
                                  <option value="{{$equipe->equ_id}}">{{$equipe->equ_nome}}</option>
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
