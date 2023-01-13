@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content')
    <form action="/paralizacao/cadastrar_fechar_premissa" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <h4 class="card-header text-black">
                        <b>Informações Premissa</b>
                    </h4>
                </div>
                <div class="form-group col-md-4">
                    <label for="pre_id">Id Premissa</label>
                    <input type="text" name="pre_id" id="pre_id" class="form-control" value="{{$premissa->pre_id}}" disabled/>
                </div>
                <div class="form-group col-md-4">
                    <label for="pre_nome">Nome</label>
                    <input type="text" name="pre_nome" id="pre_nome" class="form-control" value="{{$premissa->pre_nome}}" disabled/>
                </div>
                <div class="form-group col-md-4">
                    <label for="pre_descricao">Descrição</label>
                    <input type="text" name="pre_descricao" id="pre_descricao" class="form-control" value="{{$premissa->pre_descricao}}" disabled/>
                </div>
                <div class="col-md-3"></div>
                <div class="custom-file col-md-6">
                    <input type="file" class="custom-file-input" name="img_premissa" id="input_img">
                    <label class="custom-file-label" for="input_img_itens">Escolha o arquivo</label>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a style="text-decoration: none;color:white;" href="/paralizacao/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection

