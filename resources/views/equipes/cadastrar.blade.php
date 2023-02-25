@extends('adminlte::page')

@section('content-title', 'Cadastrar Equipe')

@section('content')

    <form action="{{route('equipes.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2>Cadastrar Equipes</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/equipe/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Casdastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="nome_equipe">Nome Equipe</label>
                                <input type="text" name="nome_equipe" id="nome_equipe" class="form-control {{$errors->has('nome_equipe') ? 'is-invalid' : ''}}" placeholder="Nome da Equipe" value="{{old('nome_equipe')}}"/>
                                @if($errors->has('nome_equipe'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nome_equipe')}}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="nome">Membros</label>
                                <select multiple name="membros_equipe[]" id="select_membros" class="form-control" >
                                    @foreach ( $membros as $membro )
                                        <option value="{{$membro->usu_id}}">{{$membro->usu_nome}}</option>
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
                <a style="text-decoration: none;color:white;" href="/equipe/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script>

        $(document).ready(function(){
            $('#select_membros').select2({
                placeholder: 'Selecione os membros'
            });
    
        });
    </script>