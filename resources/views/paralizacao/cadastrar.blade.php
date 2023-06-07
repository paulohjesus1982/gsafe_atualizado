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

                        $('.select_premissas').select2({
                            theme: 'classic',
                            tags: true
                        });
    
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

  <form action="{{route('paralizacao.salvar')}}" method="post" enctype="multipart/form-data">
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
                      <div class="form-group col-md-3">
                          <label for="par_art">ART</label>
                          <input type="text" name="par_art" id="par_art" class="form-control {{$errors->has('par_art') ? 'is-invalid' : ''}}" placeholder="PAR" value="{{old('par_art')}}"/>
                          @if($errors->has('par_art'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_art')}}
                              </div>
                          @endif
                      </div>

                      <div class="form-group col-md-3">
                        <label for="img_art_nome">ART anexo</label>
                        <div class="custom-file col-md-12">
                           <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                           <input type="file" class="custom-file-input" name="img_art" id="input_img">
                           <label class="custom-file-label" for="input_img_itens">ART anexo</label>
                        </div>
                      </div>

                      <div class="form-group col-md-3">
                          <label for="par_pet">PT</label>
                          <input type="text" name="par_pet" id="par_pet" class="form-control {{$errors->has('par_pet') ? 'is-invalid' : ''}}" placeholder="PT" value="{{old('par_pet')}}"/>
                          @if($errors->has('par_pet'))
                              <div class="invalid-feedback">
                                  {{$errors->first('par_pet')}}
                              </div>
                          @endif
                      </div>

                      <div class="form-group col-md-3">
                        <label for="img_pet_nome">PT anexo</label>
                        <div class="custom-file col-md-12">
                           <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                           <input type="file" class="custom-file-input" name="img_pet" id="input_img">
                           <label class="custom-file-label" for="input_img_itens">PT anexo</label>
                        </div>
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
                        <select name="servico" id="servico" class="form-control servico" multiple="multiple" aria-hidden="true" placeholder="Selecionas serviços">
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
                        <select name="permissoes[]" id="permissoes" class="form-control permissoes pegarValor" multiple="multiple" aria-hidden="true" placeholder="Selecionar permissões" onchange="mostraPremissas()">
                            @foreach ( $permissoes as $permissao )
                                <option value="{{$permissao->per_id}}">{{$permissao->per_nome}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group" hidden id="div_premissas">
                            <label for="nome">Premissas</label>
                            <select name="premissas[]" id="select_premissas" class="form-control select_premissas" multiple="multiple" aria-hidden="true" placeholder="Selecionar premissas">
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
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
<script>

            //Transforma o select da premissas dentro a função mostrarPremissas. Pq aqui transforma assim que o dom fica pronto.
            $(document).ready(function(){
            $('.permissoes').select2({
                theme: 'classic',
                tags: true
            });
            $('.servico').select2({
                theme: 'classic',
                tags: true
            });
            $(".select2-search, .select2-focusser").remove();          
        });
</script>