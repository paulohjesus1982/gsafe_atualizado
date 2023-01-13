@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content')
    <form action="/paralizacao/cadastrar_fechar_premissa" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="img_premissa" id="input_img_itens">
            <label class="custom-file-label" for="input_img_itens">Escolha o arquivo</label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>

    </form>

@endsection

