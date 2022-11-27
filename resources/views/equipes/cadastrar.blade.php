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
    <form action="{{route('equipes.salvar')}}" method="post">
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
                                <label for="cpf">Nome Equipe</label>
                                <input type="text" name="nome_equipe" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nome">Membros</label>
                                <select multiple type="select" name="membros_equipe" id="select_membros" class="form-multi-select">
                                    @foreach ( $membros as $membro )
                                    <option value="{{$membro->usu_id}}">{{$membro->usu_nome}}</option>
                                    @endforeach
                                  </select>
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
