@extends('adminlte::page')

@section('content-title', 'Nova Empresa')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Empresa</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{route('empresa.salvar')}}" method="post">
        {{ csrf_field()}}


        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro de Empresas</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/empresa/listar">Listar</a></li>
                  <li class="breadcrumb-item active">empresa</li>
                </ol>
              </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Cadastro da Empresa</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nome_empresa">Nome Empresa</label>
                                <input type="text" name="nome_empresa" class="form-control" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="razao_social_empresa">Razão Social</label>
                                <input type="text" name="razao_social_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">CNPJ Empresa</label>
                                <input type="text" name="cpnj_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Número Contato</label>
                                <input type="phone" name="contato_empresa" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Email Contrato</label>
                                <input type="email" name="email_empresa" class="form-control" autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contato_empresa">Tipo Empresa</label>
                                <select class="custom-select" name="tipo_empresa">
                                    <option value="0">-- SELECIONE --</option>
                                    <option value="1">Matriz</option>
                                    <option value="2">Parceira</option>
                                </select>
                            </div>
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
                    <button type="submit" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
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
