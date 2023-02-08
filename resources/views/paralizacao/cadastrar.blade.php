@extends('adminlte::page')

@section('content-title', 'Cadastrar Paralização')

@section('content-path')

@endsection

@section('content')
    {{-- essa desgraça aqui em baixa que faz o fontawesome funcionar --}}
    <script src="https://kit.fontawesome.com/27e7fcbbbe.js" crossorigin="anonymous"></script> 
    <script type="text/javascript">
        function mostraPremissas(){
            var valor_permissao = '';
            valor_permissao = $("#permissoes").val();

            $.ajax({
            'processing': true,
            'serverSide': false,
                type: "GET",
                url: "/premissa/listar/" + valor_permissao,
                success: function(s) {
                    var retorno = $(s);

                    if (retorno.length === 0) { 
                        $('#select_premissas').empty();
                        $('#div_premissas').attr("hidden", "hidden");
                    }else{
                        $('#select_premissas').empty();
    
                        $('#div_premissas').removeAttr('hidden');
    
                        $.each(retorno, function(r, retorno) {
                            console.log(retorno);
                            $('#select_premissas').append($('<option>', {
                                value: retorno.pre_id +"_"+ retorno.per_id,
                                text: retorno.pre_nome
                            }));
                        });
                    }
                }
            });
        }
    </script>

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
                              <option value="0">Em andamento</option>
                              <option value="1">Liberação</option>
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
                      <div class="form-group col-md-12">
                        <h4 class="card-header text-black">
                            <b>Serviços</b>
                        </h4>
                      </div>
                      <div class="form-group col-md-12">
                        <select name="servico" id="servico" class="custom-select">
                            @foreach ( $servicos as $servico )
                                <option value="{{$servico->ser_id}}">{{$servico->ser_nome}}</option>
                            @endforeach
                        </select>
                      </div> 
                      <div class="form-group col-md-12">
                        <h4 class="card-header text-black">
                            <b>Permissões</b>
                        </h4>
                      </div>
                      <div class="form-group col-md-12">
                        <select multiple type="select" name="permissoes[]" id="permissoes" class="custom-select pegarValor" onchange="mostraPremissas()">
                            @foreach ( $permissoes as $permissao )
                                <option value="{{$permissao->per_id}}">{{$permissao->per_nome}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group" hidden id="div_premissas">
                            <label for="nome">Premissas</label>
                            <select multiple type="select" name="premissas[]" id="select_premissas" class="custom-select" >
                            </select>
                        </div>
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
