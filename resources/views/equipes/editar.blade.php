@extends('adminlte::page')

@section('content-title', 'Editar Equipe')

@section('content')

<form action="{{route('equipes.atualizar')}}" method="post">
    {{ csrf_field()}}
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>Editar</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/equipe/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Editar Equipe</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <h5 class="card-header text-grey">
                    <b>Informações da Equipe</b>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="codigo_equipe" id="codigo_equipe" value="{{$equipes->equ_id}}"/>
                        <div class="col-6" >
                            <label for="nome_equipe">Nome</label>
                            <input type="text" id="nome_equipe" name="nome_equipe" class="form-control" required value="{{$equipes->equ_nome}}" placeholder="Nome Equipe"/>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="nome_equipe">Membros Equipe</label>
                            <select class="custom-select" name="membros[]" multiple="multiple">
                                @foreach ( $todos_usuarios as $usuario )
                                    @foreach ( $membros as $membro )
                                        @if($usuario->usu_id == $membro->usu_id )
                                            <?php $selected = "selected" ?>
                                        @endif
                                    @endforeach
                                    <option <?php echo $selected; ?> value="{{$usuario->usu_id}}">{{$usuario->usu_nome}}</option>
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
            <a style="text-decoration: none;color:white;" href="/equipe/listar">
                <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
            </a>
        </div>
    </div>
</form>
@endsection
