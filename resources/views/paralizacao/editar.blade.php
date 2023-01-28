@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content')
<form action="{{route('paralizacao.atualizar')}}" method="post">
    {{ csrf_field()}}
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2> Editar Empresas</h2>
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
                  <b>Informações Paralizações</b>
              </h5>
              <div class="card-body">
                  <div class="row">
                     <div class="form-group col-md-6" >
                         <label for="par_id">Código</label>
                         <input type="text" name="par_id" class="form-control" value="{{$paralizacao->par_id}}" readonly/>
                     </div>
                      <div class="form-group col-md-6">
                          <label for="par_art">ART</label>
                          <input type="text" name="par_art" id="par_art" class="form-control" placeholder="PAR" value="{{$paralizacao->par_art}}"/>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="par_pet">PET</label>
                          <input type="text" name="par_pet" id="par_pet" class="form-control" placeholder="PET" value="{{$paralizacao->par_pet}}"/>
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
                      <div class="form-group col-md-6">
                          <label for="par_fk_emp_id">Empresa</label>
                          <select class="custom-select" name="par_fk_emp_id">
                              @foreach ( $empresas as $empresa )
                                @if($empresa->emp_id == $paralizacao['empresas']->emp_id)
                                    <?php $selected_empresa = "selected"; ?>
                                @endif
                                <option <?php echo $selected_empresa; ?> value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}</option>
                                <?php $selected_empresa = "" ?>
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
