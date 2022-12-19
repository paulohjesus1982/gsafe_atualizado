@extends('adminlte::page')

@section('content-title', 'Editar Equipe')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Equipe</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')

    <form action="{{route('usuario.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <input type="hidden" name="codigo_usuario" value="{{$usuario->usu_id}}"/>

                            <div class="col-6" >
                                <label for="nome_usuario">Nome</label>
                                <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" required value="{{$usuario->usu_nome}}" placeholder="Nome usuário"/>
                            </div>
                            
                            <div class="col-6" >
                                <label for="nome_usuario">E-mail</label>
                                <input type="text" id="email_usuario" name="email_usuario" class="form-control" required value="{{$usuario->usu_email}}" placeholder="E-mail usuário"/>
                            </div>
                            <div class="col-6" >
                                <label for="nome_usuario">Senha</label>
                                <input type="password" id="senha_usuario" name="senha_usuario" class="form-control" required value="{{$usuario->usu_senha}}" placeholder="email usuario"/>
                            </div>
                            <div class="col-6" >
                                <label for="tipo_usuario">Tipo Usuário</label>
                                <select class="custom-select" name="tipo_usuario" id="tipo_usuario">
                                    <option value="1">Administrador</option>
                                    <option value="2">Colaborador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Salvar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
