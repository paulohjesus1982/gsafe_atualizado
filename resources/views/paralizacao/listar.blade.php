@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <h1 class="m-0 text-dark">Paralizações</h1>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}
{{-- essa desgraça aqui em baixa que faz o fontawesome funcionar --}}
<script src="https://kit.fontawesome.com/27e7fcbbbe.js" crossorigin="anonymous"></script> 

<script type="text/javascript">

    function MostrarDadosParalizacao(id){
        var par_id = id;        

        $.ajax({
            'processing': true,
            'serverSide': false,
            type: "GET",
            data: {par_id : par_id},
            url: "/paralizacao/listar_permissao/" + par_id,
            success: function(dados) {
                var retorno = $(dados);

                $('#div_dados_paralizacao').empty();
                $('#div_premissas').removeAttr('hidden');

                //criar a tabela
                var Tabela = document.createElement("table");
                var Cabecalho = document.createElement("thead");
                var Corpo = document.createElement("tbody");




                
                Tabela.appendChild(Cabecalho);
                Tabela.appendChild(Corpo);
                //adicionar a tabela na div
                document.getElementById("div_dados_paralizacao").appendChild(Tabela);

                $.each(retorno[0], function(r, retorno) {
                    if(r == 'permissao'){
                        console.log('b');
                    } else if(r == 'premissas'){
                        console.log('c');
                    }
                    // $('#select_premissas').append($('<option>', {
                    //     value: retorno.pre_id,
                    //     text: retorno.pre_nome
                    // }));
                });
                document.getElementById("ver_mais_"+id).setAttribute("onclick", "FecharDadosParalizacao("+id+")");
            }
        });
    }

    function FecharDadosParalizacao(id){ 
        document.getElementById('ver_mais_'+id).setAttribute("onclick", "MostrarDadosParalizacao("+id+")");
        $('#div_dados_paralizacao').empty();
        $('#div_premissas').attr('hidden','hidden');
    }

</script>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Listar Paralizações</h2>
        </div>
        <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Listar</li>
            </ol>
        </div>
        <div class="col-1">
            <a href="/paralizacao/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Empresas</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Procurar">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PT</th>
                            <th>ART</th>
                            <th>Empresa</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $paralizacoes as $paralizacao )
                            <tr>
                                <td>{{$paralizacao->par_id}}</td>
                                <td>{{$paralizacao->par_pet}}</td>
                                <td>{{$paralizacao->par_art}}</td>
                                <td>{{$par->AchaEmpresaNome($paralizacao->par_fk_emp_id)}}</td>
                                <td>
                                    @if ($paralizacao->par_enum_estado_paralizacao == 0)
                                        Em andamento
                                    @else
                                        Liberado
                                    @endif
                                    {{-- {{$paralizacao->par_enum_estado_paralizacao}} --}}
                                </td>
                                <td>
                                    <a href="/paralizacao/editar/{{$paralizacao->par_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Editar
                                            </span>
                                        </span>
                                    </a>
                                    | 
                                    <a href="/paralizacao/listar_permissao/{{$paralizacao->par_id}}" class="navi-link">
                                        <span class="navi-text">
                                            <span class="label label-xl label-inline label-light-primary">
                                                Detalhes
                                            </span>
                                        </span>
                                    </a>
                                    {{-- | 
                                    <button type="button" class="btn btn-outline-primary" onclick="MostrarDadosParalizacao({{$paralizacao->par_id}})" id="ver_mais_{{$paralizacao->par_id}}" value="{{$paralizacao->par_id}}">
                                        <i class="fa-solid fa-circle-plus"></i> 
                                    </button> 
                                    --}}
                                </td>
                            </tr>
                            {{-- <div class="col-md-12">
                                <div class="form-group" hidden id="div_dados_paralizacao">
                                    
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection