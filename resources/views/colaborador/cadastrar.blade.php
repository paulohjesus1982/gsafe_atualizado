@extends('adminlte::page')

@section('content-title', 'Novo CLiente')

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
    <form action="" method="post">
        {{ csrf_field()}}

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <h5 class="card-header text-white">
                        <b>Informações Colaborador</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="cpf">CNPJ</label>
                                <input type="text" name="cpf" id="cpf" class="form-control {{$errors->has('cpf') ? 'is-invalid' : ''}}" placeholder="CPF" value="{{old('cpf')}}" autofocus/>
                                @if($errors->has('cpf'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('cpf')}}
                                    </div>
                                @endif
                            </div>

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
                                <label for="rg">RG</label>
                                <input type="text" name="rg" id="rg" class="form-control {{$errors->has('rg') ? 'is-invalid' : ''}}" placeholder="RG" value="{{old('rg')}}"/>
                                @if($errors->has('rg'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('rg')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="conjuge">Conjuge</label>
                                <input type="text" name="conjuge" id="conjuge" class="form-control {{$errors->has('conjuge') ? 'is-invalid' : ''}}" placeholder="Nome do conjuge" value="{{old('conjuge')}}"/>
                                @if($errors->has('conjuge'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('conjuge')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="profissao">Profissão</label>
                                <input type="text" name="profissao" id="profissao" class="form-control {{$errors->has('profissao') ? 'is-invalid' : ''}}" placeholder="Nome da profissão" value="{{old('profissao')}}"/>
                                @if($errors->has('profissao'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('profissao')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cargo">Cargo</label>
                                <select name="cargo" id="cargo" class="form-control">

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="data_inicio">Data de Início</label>
                                <input type="date" name="data_inicio" id="data_inicio" class="form-control">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <h5 class="card-header text-white">
                        <b>Informações de Contato</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}" placeholder="Email" title="Email">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="confirmar_email">Confirmar Email</label>
                                <input type="email" name="confirmar_email" id="confirmar_email" class="form-control {{$errors->has('confirmar_email') ? 'is-invalid' : ''}}" value="{{old('confirmar_email')}}" placeholder="Confirmar email" title="Confirmar email">
                                @if($errors->has('confirmar_email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('confirmar_email')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="numero" id="telefone" class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}" value="{{old('numero')}}" placeholder="Número do telefone" title="Número de telefone">
                                @if($errors->has('numero'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telefone_tipo">Tipo de Telefone</label>
                                <select name="telefone_tipo_id" id="telefone_tipo_id" class="form-control">

                                </select>
                                @if($errors->has('telefone_tipo_id'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('telefone_tipo_id')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="telefone_tipo">Deseja ser encontrado por outros Companheiros Lions?</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="encontrarSim" name="encontrar" class="custom-control-input" value="1" {{(old('encontrar') == "1") ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="encontrarSim">Sim</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="encontrarNao" name="encontrar" class="custom-control-input" value="0" {{(old('encontrar') == "0") ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="encontrarNao">Nao</label>
                                </div>
                                @if($errors->has('telefone_tipo'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('telefone_tipo')}}
                                    </div>
                                @endif
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
