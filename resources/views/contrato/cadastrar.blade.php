@extends('adminlte::page')

@section('content-title', 'Novo Contrato')

@section('content-path')
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Início</li>
            <li class="breadcrumb-item">Premissa</li>
            <li class="breadcrumb-item active">Novo</li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{route('contrato.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro Contrato</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/conntrato/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Contrato</li>
                </ol>
              </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-black">
                        <b>Informações Contrato</b>
                    </h5>
                    <div class="form-group col-md-6">
                        <label for="nome_contrato">Titulo Contrato</label>
                        <input type="text" name="nome_contrato" class="form-control" placeholder=""/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="data_inicio">Data Inicio</label>
                        <input type="date" name="data_inicio" class="form-control"
                        value=""
                        autofocus/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" class="form-control" value="" autofocus/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="paralizacao">Paralização</label>
                        <select class="custom-select" name="paralizacao">
                            @foreach ( $paralizacoes as $paralizacao )
                                <option value="{{$paralizacao->par_id}}">{{$paralizacao->par_justificativa}}<option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="empresa">Empresa</label>
                        <select class="custom-select" name="empresa">
                            @foreach ( $empresas as $empresa )
                                <option value="{{$empresa->emp_id}}">{{$empresa->emp_nome}}<option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tipo_contrato">Tipo Contrato</label>
                        <select class="custom-select" name="tipo_contrato">
                            <option value='1'>Principal</option>
                            <option value='2'>Sub-Contrato</option>
                        </select>
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
