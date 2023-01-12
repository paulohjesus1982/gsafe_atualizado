@extends('adminlte::page')

@section('content-title', 'Editar Permissão')

@section('content')

    <form action="{{route('permissao.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Permissão</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/permissao/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Editar</li>
                </ol>
              </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Permissão</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label for="codigo_permissao">Código</label>
                                    <input type="text" name="codigo_permissao" class="form-control" value="{{$permissao->per_id}}" readonly/>
                                </div>
                                <div class="form-group col-md-4" >
                                    <label for="nome_permissao">Nome</label>
                                    <input type="text" name="nome_permissao" class="form-control"  value="{{$permissao->per_nome}}" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rgb_permissao">Selecionar Cor</label>
                                    <input type="color" class="form-control" name="rgb_permissao" value="{{$permissao->per_rgb}}">
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="premissas">Premissas</label>
                                    <select class="custom-select" name="premissas[]" multiple="multiple">
                                        @foreach ( $todas_premissas as $premissas_ )
                                            @foreach ( $premissas as $premissa_ )
                                                @foreach ( $premissa_ as $premissa )
                                                    @if($premissas_->pre_id == $premissa->pre_id )
                                                        <?php $selected = "selected" ?>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <option <?php echo $selected; ?> value="{{$premissas_->pre_id}}">{{$premissas_->pre_nome}}</option>
                                            <?php $selected = "" ?>
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
                <a style="text-decoration: none;color:white;" href="/permissao/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
