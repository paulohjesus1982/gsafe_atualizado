@extends('adminlte::page')

@section('content-title', 'Editar Usuário')

@section('content')

    <form action="{{route('usuario.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Usuário</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/usuario/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <input type="hidden" name="codigo_usuario" value="{{$usuario->usu_id}}"/>
                            <input type="hidden" name="codigo_dados_usuario" value="{{isset($usuario['usuario_dados']->udad_id) ? $usuario['usuario_dados']->udad_id : ''}}"/>

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
            <div class="col-md-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-black">
                        <b>Informações de Contato</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="telefone">Nome Completo</label>
                                <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="{{isset($usuario['usuario_dados']->udad_nome_completo) ? $usuario['usuario_dados']->udad_nome_completo : '' }}" placeholder="Nome Completo" title="Nome Completo">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telefone">Número</label>
                                <input type="text" name="numero_endereco" id="numero_endereco" class="form-control" value="{{isset($usuario['usuario_dados']->udad_numero) ? $usuario['usuario_dados']->udad_numero : ''}}" placeholder="Número" title="Número">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Rua</label>
                                <input type="text" name="endereco" id="endereco" class="form-control" value="{{isset($usuario['usuario_dados']->udad_endereco) ? $usuario['usuario_dados']->udad_endereco : ''}}" placeholder="Endereço" title="Endereço">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" value="{{isset($usuario['usuario_dados']->udad_bairro) ? $usuario['usuario_dados']->udad_bairro : ''}}" placeholder="Bairro" title="Bairro">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telefone">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control" value="{{isset($usuario['usuario_dados']->udad_cep) ? $usuario['usuario_dados']->udad_cep : ''}}" placeholder="CEP" title="CEP">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" value="{{isset($usuario['usuario_dados']->udad_cidade) ? $usuario['usuario_dados']->udad_cidade : ''}}" placeholder="Cidade" title="Cidade">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Estado (UF)</label>
                                <input type="text" name="estado" id="estado" class="form-control" value="{{isset($usuario['usuario_dados']->udad_estado) ? $usuario['usuario_dados']->udad_estado : ''}}" placeholder="estado" title="Estado">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Principal</label>
                                <input type="text" name="numero_principal" id="numero_principal" class="form-control" value="{{isset($usuario['usuario_dados']->udad_telefone_principal) ? $usuario['usuario_dados']->udad_telefone_principal : ''}}" placeholder="Número do telefone" title="Número de telefone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Contato</label>
                                <input type="text" name="numero_contato" id="numero_contato" class="form-control" value="{{isset($usuario['usuario_dados']->udad_telefone_contato) ? $usuario['usuario_dados']->udad_telefone_contato : ''}}" placeholder="Número do telefone" title="Número de telefone">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefone">Registro Profissão</label>
                                <input type="text" name="registro_profissao" id="registro_profissao" class="form-contro" value="{{isset($usuario['usuario_dados']->udad_registro_profissao) ? $usuario['usuario_dados']->udad_registro_profissao : ''}}" placeholder="Registro Profissão" title="Registro Profissão">
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
                <a style="text-decoration: none;color:white;" href="/usuario/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
