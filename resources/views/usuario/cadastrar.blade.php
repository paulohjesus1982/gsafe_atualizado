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
        
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline-info">
                    <h5 class="card-header text-white">
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
                                <label for="nome">Email</label>
                                <input type="email" name="nome" id="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" placeholder="Nome" value="{{old('nome')}}"/>
                                @if($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nome')}}
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
                <div class="card card-outline-info">
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

                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Principal</label>
                                <input type="text" name="numero" id="telefone" class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}" value="{{old('numero')}}" placeholder="Número do telefone" title="Número de telefone">
                                @if($errors->has('numero'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telefone">Telefone Contato</label>
                                <input type="text" name="numero" id="telefone" class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}" value="{{old('numero')}}" placeholder="Número do telefone" title="Número de telefone">
                                @if($errors->has('numero'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('numero')}}
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
