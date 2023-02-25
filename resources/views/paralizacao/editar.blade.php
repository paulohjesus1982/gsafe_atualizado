@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content')
<script src="https://kit.fontawesome.com/27e7fcbbbe.js" crossorigin="anonymous"></script> 
<script type="text/javascript">
    function mostraPremissas(){
        var premissas = {!! json_encode($premissas) !!};
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
                    var selected = '';
                    $.each(retorno, function(r, retorno) {
                        Object.keys(premissas).forEach(key => {
                            if(key == retorno.per_id){
                                if (premissas[key].pre_id == retorno.pre_id) {
                                    selected = 'selected';
                                }
                            }
                        });
                        // premissas.forEach(element => {
                            
                        //     if (element.pre_id == retorno.pre_id) {
                        //         selected = 'selected';
                        //     }
                        // });

                        var premissa_permissao = retorno.pre_id +"_"+ retorno.per_id ;

                        $('#select_premissas').append($("<option " + selected + " value='" + premissa_permissao +"'> " + retorno.pre_nome +"</option>"));
                        selected = '';
                    });
                }
            }
        });
    }
</script>
<form action="{{route('paralizacao.atualizar')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2> Editar Paralização</h2>
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
      <div class="col-md-12">
          <div class="card card-primary">
              <h5 class="card-header text-black">
                  <b>Informações Paralização {{$paralizacao->par_id}}</b>
              </h5>
              <div class="card-body">
                  <div class="row">
                    <input type="hidden" name="par_id" class="form-control" value="{{$paralizacao->par_id}}"/>
                      <div class="form-group col-md-6">
                          <label for="par_art">ART</label>
                          <input type="text" name="par_art" id="par_art" class="form-control" placeholder="PAR" value="{{$paralizacao->par_art}}" readonly/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="img_art_nome">ART anexo</label>
                        <div class="custom-file col-md-12">
                           <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                           <input type="file" class="custom-file-input" name="img_art" id="input_img" value="{{$paralizacao->par_art_img}}">
                           <label class="custom-file-label" for="input_img_itens">ART anexo</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_pet">PET</label>
                          <input type="text" name="par_pet" id="par_pet" class="form-control" placeholder="PET" value="{{$paralizacao->par_pet}}" readonly/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="img_pet_nome">PET anexo</label>
                        <div class="custom-file col-md-12">
                           <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                           <input type="file" class="custom-file-input" name="img_pet" id="input_img" value="{{$paralizacao->par_pet_img}}">
                           <label class="custom-file-label" for="input_img_itens">PET anexo</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_fk_emp_id">Empresa</label>
                          <input type="text" name="par_fk_emp_id" id="par_fk_emp_id" class="form-control" placeholder="Empresa" value="{{$par->AchaEmpresaNome($paralizacao->par_fk_emp_id)}}" readonly/>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_enum_estado_paralizacao">Estado Paralização</label>
                          <select class="custom-select" name="par_enum_estado_paralizacao">
                              @foreach ( $estados_paralizacao as $chave => $estado_par )

                                @if($chave == $paralizacao->par_enum_estado_paralizacao)
                                    <?php $selected_estado_paralizacao = "selected"; ?>
                                @endif

                                <option <?php echo $selected_estado_paralizacao; ?> value="{{$chave}}">
                                    {{-- justificando a gambiarra abaixo: não sei pq o laravel não aceita eu mandar caracteres com acento da controller pra view, tenho que procurar mais sobre --}}
                                    @if( $estado_par == "Liberacao")
                                        Liberação
                                    @else
                                        {{$estado_par}}
                                    @endif
                                </option>

                                <?php $selected_estado_paralizacao = "" ?>

                              @endforeach
                          </select>
                      </div>

                      <div class="form-group col-md-12">
                        <h4 class="card-header text-black">
                            <b>Serviço</b>
                        </h4>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="ser_id">Id Serviço</label>
                          <input type="text" name="ser_id" id="ser_id" class="form-control" placeholder="Serviço" value="{{$servico->ser_id}}" readonly/>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="ser_id">Serviço</label>
                          <input type="text" name="ser_nome" id="ser_nome" class="form-control" placeholder="Id Serviço" value="{{$servico->ser_nome}}" readonly/>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="ser_id">Área atuação</label>
                          <input type="text" name="ser_area_atuacao" id="ser_area_atuacao" class="form-control" placeholder="Area atuação Serviço" value="{{$servico->ser_area_atuacao}}" readonly/>
                      </div>

                      <div class="form-group col-md-12">
                        <h4 class="card-header text-black">
                            <b>Permissões</b>
                        </h4>
                      </div>
                      <div class="form-group col-md-12">
                        <select multiple type="select" name="permissoes[]" id="permissoes" class="custom-select pegarValor" onchange="mostraPremissas()">
                            <?php $selected = ""; ?>
                            @foreach ( $todas_permissoes as $permissao )
                                @foreach ( $permissoes as $per )
                                    @if($per->per_id == $permissao->per_id)
                                        <?php $selected = "selected"; ?>
                                    @endif
                                @endforeach
                                <option <?php echo $selected; ?> value="{{$permissao->per_id}}">{{$permissao->per_nome}}</option>
                                <?php $selected = ""; ?>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group" id="div_premissas">
                            <h4 class="card-header text-black">
                                <b>Premissas</b>
                            </h4>
                            <select multiple type="select" name="premissas[]" id="select_premissas" class="custom-select" >
                                <?php $selected = ""; $chave = ""; ?>
                                
                                @foreach ( $todas_premissas as $premissa)
                                    @foreach ( $premissas as $key => $premissa_ )
                                        @foreach ( $premissa_ as $pre )
                                            @if($pre->pre_id == $premissa->pre_id)
                                                <?php $selected = "selected"; $chave = $key; ?>
                                            @endif                                                        
                                        @endforeach
                                    @endforeach
                                    
                                    <option <?php echo $selected; ?> value="{{$premissa->pre_id}}_{{$chave}}">{{$premissa->pre_nome}}</option>
                                    <?php $selected = ""; $chave = "";  ?>
                                @endforeach
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

    $(document).ready(function(){
        $('#select_premissas').select2();
        $('#permissoes').select2();

    });
</script>