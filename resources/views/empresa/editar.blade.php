@extends('adminlte::page')

@section('content-title', 'Editar Empresa')

@section('content')

    <form action="{{route('empresa.atualizar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Editar Empresa</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/empresa/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Editar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <h5 class="card-header text-grey">
                        <b>Informações Empresa</b>
                    </h5>
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4" >
                                    <label for="codigo_permissao">Código</label>
                                    <input type="text" name="codigo_empresa" class="form-control" value="{{$empresa->emp_id}}" readonly/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome_empresa">Nome Empresa</label>
                                    <input type="text" name="nome_empresa" class="form-control" value="{{$empresa->emp_nome}}" autofocus/>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="razao_social_empresa">Razão Social</label>
                                    <input type="text" name="razao_social_empresa" class="form-control" value="{{$empresa->emp_razao_social}}" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contato_empresa">CNPJ Empresa</label>
                                    <input type="text" name="cpnj_empresa" class="form-control" value="{{$empresaFuncao->TratarCnpj2($empresa->emp_cnpj)}}" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contato_empresa">Número Contato</label>
                                    <input type="phone" name="contato_empresa" class="form-control" value="{{$empresaFuncao->numeros2Fone($empresa->emp_contato)}}" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contato_empresa">Email Contrato</label>
                                    <input type="email" name="email_empresa" class="form-control" value="{{$empresa->emp_email}}" autofocus/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contato_empresa">Tipo Empresa</label>
                                    <select class="custom-select" name="tipo_empresa">
                                        @foreach ($tipos_de_empresas as $key => $empresa)
                                            @if($key == $tipo_empresa )
                                                <?php $selected = "selected" ?>
                                            @endif
                                            <option <?php echo $selected; ?> value="{{$key}}">{{$empresa}}</option>
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
                <a style="text-decoration: none;color:white;" href="/empresa/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
