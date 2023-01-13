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
                <div class="form-group col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="pre_descricao">Imagem</label>
                    <div>
                        @if (count($paralizacoes_premissa) > 0)
                            <?php
                                $anexo = $paralizacoes_premissa[0]->ppre_caminho_anexo; 
                            ?>
                            <img src="{{ asset("$anexo") }}" class="img-responsive" style="height: 400px; width: 400px;">
                        @else
                            Sem imagem
                        @endif
                        {{-- <img src="{{ asset('storage/img_premissa/capacete_1673638789.jpeg') }}" class="img-responsive" style="height: 400px; width: 400px;"> --}}
                    </div>
                </div>
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