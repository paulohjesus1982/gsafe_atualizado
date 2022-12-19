@extends('adminlte::page')

@section('content-title', 'Novo Associado')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Associado</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{route('usuario.salvar')}}" method="post">
        {{ csrf_field()}}


        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro de Usuario</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/usuario/listar">Listar</a></li>
                  <li class="breadcrumb-item active">usuario</li>
                </ol>
              </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" placeholder="Nome" value="{{old('nome')}}"/>
                                @if($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nome')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="email" value="{{old('email')}}"/>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control {{$errors->has('senha') ? 'is-invalid' : ''}}" placeholder="Senha de acesso ao sistema" value="{{old('senha')}}"/>
                                @if($errors->has('senha'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('senha')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nome">Tipo Usuário</label>
                                <select type="select" name="tipo_usuario" id="tipo_usuario" class="form-control">
                                    <option value='0'>-- SELECIONE --</option>
                                    <option value='1'>Admin</option>
                                    <option value='2'>Colaborador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações de Contato</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="telefone">Nome Completo</label>
                                <input type="text" name="nome_completo" id="nome_completo" class="form-control {{$errors->has('nome_completo') ? 'is-invalid' : ''}}" value="{{old('nome_completo')}}" placeholder="Nome Completo" title="Nome Completo">
                                @if($errors->has('nome_completo'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nome_completo')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telefone">Número</label>
                                <input type="text" name="numero_endereco" id="numero_endereco" class="form-control {{$errors->has('numero_endereco') ? 'is-invalid' : ''}}" value="{{old('numero_endereco')}}" placeholder="Número" title="Número">
                                @if($errors->has('numero_endereco'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero_endereco')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Rua</label>
                                <input type="text" name="endereco" id="endereco" class="form-control {{$errors->has('endereco') ? 'is-invalid' : ''}}" value="{{old('endereco')}}" placeholder="Endereço" title="Endereço">
                                @if($errors->has('endereco'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('endereco')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control {{$errors->has('bairro') ? 'is-invalid' : ''}}" value="{{old('bairro')}}" placeholder="Bairro" title="Bairro">
                                @if($errors->has('bairro'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('bairro')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="telefone">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control {{$errors->has('cep') ? 'is-invalid' : ''}}" value="{{old('cep')}}" placeholder="CEP" title="CEP">
                                @if($errors->has('cep'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('cep')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control {{$errors->has('cidade') ? 'is-invalid' : ''}}" value="{{old('cidade')}}" placeholder="Cidade" title="Cidade">
                                @if($errors->has('cidade'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('cidade')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="telefone">Estado (UF)</label>
                                <input type="text" name="estado" id="estado" class="form-control {{$errors->has('estado') ? 'is-invalid' : ''}}" value="{{old('estado')}}" placeholder="estado" title="Estado">
                                @if($errors->has('estado'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('estado')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Principal</label>
                                <input type="text" name="numero_principal" id="numero_principal" class="form-control {{$errors->has('numero_principal') ? 'is-invalid' : ''}}" value="{{old('numero_principal')}}" placeholder="Número do telefone" title="Número de telefone">
                                @if($errors->has('numero_principal'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero_principal')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Contato</label>
                                <input type="text" name="numero_contato" id="numero_contato" class="form-control {{$errors->has('numero_contato') ? 'is-invalid' : ''}}" value="{{old('numero_contato')}}" placeholder="Número do telefone" title="Número de telefone">
                                @if($errors->has('numero_contato'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero_contato')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefone">Registro Profissão</label>
                                <input type="text" name="registro_profissao" id="registro_profissao" class="form-control {{$errors->has('registro_profissao') ? 'is-invalid' : ''}}" value="{{old('registro_profissao')}}" placeholder="Registro Profissão" title="Registro Profissão">
                                @if($errors->has('registro_profissao'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('registro_profissao')}}
                                    </div>
                                @endif
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
                    <a href="usuario/listar"><button class="btn btn-danger btn-block"><span class="fa fa-check"></span>Cancelar</button></a>
                </div>

        </div>
    </form>
@endsection

@push('scripts')
<script>
    //Consulta do CEP para o endereço
    function erroConsultaCEP(msg){
        toastr.remove();
        toastr.error(msg, {
            timeout: 3000,
            "closeButton": true,
            "newestOnTop": true,
            "progressBar": true,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": true
        });
    }
    $("#cep").on('focusout', function(){
        var cep = $(this).val();
        cep = cep.replace(/[^0-9]/g,'');
        if(cep.length == 8){
            toastr.remove();
            toastr.info("Consultando CEP...", {
                "closeButton": true,
                "newestOnTop": true,
                "progressBar": true,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "tapToDismiss": true
            });
            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                type: 'GET',
                success: function (data) {
                    toastr.clear();
                    if(data.erro == true){
                        erroConsultaCEP("CEP não encontrado");
                    }else{
                        toastr.remove();
                        toastr.success("CEP Encontrado com Sucesso!", {
                            timeout: 3000,
                            "closeButton": true,
                            "newestOnTop": true,
                            "progressBar": true,
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut",
                            "tapToDismiss": true
                        });
                        $("#cep").val(data.cep);
                        $("#rua").val(data.logradouro);
                        $("#bairro").val(data.bairro);
                        $("#complemento").val(data.complemento);
                        $("#cidade").val(data.localidade);
                        $("#uf").val(data.uf);
                    }
                },
                error: function (e) {
                    console.log(e);
                    erroConsultaCEP("Ocorreu algum erro ao consultar o CEP");
                }
            })
        }else{
            erroConsultaCEP("CEP Inválido");
        }
    });
</script>
@endpush
