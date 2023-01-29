@extends('adminlte::page')

@section('content-title', 'Listar Equipe')

@section('content')
{{ csrf_field()}}
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2> Listar Membros Equipes</h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/equipe/listar">Listar</a></li>
                    <li class="breadcrumb-item active">Listar Membros Equipe</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
            <h5 class="card-header text-grey">
                <b>Membros da Equipe {{$equipe->equ_nome}}</b>
            </h5>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $usuarios as $usuario )
                            @foreach ($equipe_membros as $equipe_membro)
                                <?php
                                    if($usuario->usu_id == $equipe_membro->emem_fk_usu_id){
                                        $valor_status = $equipe_membro->emem_status_operador;
                                        if($valor_status == 0){
                                            $status = "Inativo";
                                        }else{
                                            $status = "Ativo";
                                        }
                                    }
                                ?>
                            @endforeach
                            <tr>
                                <td>{{$usuario->usu_id}}</td>
                                <td>{{$usuario->usu_nome}}</td>
                                <td>{{$usuario->usu_email}}</td>
                                <td>{{$status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <a style="text-decoration: none;color:white;" href="/equipe/listar">
            <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Voltar</button>
        </a>
    </div>
</div>


@endsection