@extends('adminlte::page')

@section('content-title', 'Acesso Negado')

@section('content')
<h1>Acesso Negado</h1>
<h4>Você não possuí autorização para acessar esta opção, solicite ao administador a liberação.</h4>
    <a href="/home"></a>
    <button class="btn btn-primary" onclick="location.href='/home'" type="button">
        Tela Inicial</button>
@endsection