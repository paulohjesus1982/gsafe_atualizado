@extends('adminlte::page')

@section('content-title', 'Cadastrar Permissão')

@section('content')
    <form action="{{route('permissao.salvar')}}" method="post">
        {{ csrf_field()}}

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h2> Cadastro de Permissão</h2>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/permissao/listar">Listar</a></li>
                  <li class="breadcrumb-item active">Cadastrar</li>
                </ol>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <h5 class="card-header text-white">
                        <b>Informações Pessoais</b>
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cpf">Nome Permissão</label>
                                <input type="text" name="nome_permissao" class="form-control" autofocus/>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rgb_permissao">Selecionar Cor</label>
                                <input type="color" class="form-control" name="rgb_permissao" value="#000000">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="nome">Premissas</label>
                                <select name="premissas[]" id="premissas" class="form-control select_membros" multiple="multiple" aria-hidden="true" placeholder="Selecione as premissas">
                                    @foreach ( $premissas as $premissa )
                                        <option value="{{$premissa->pre_id}}">{{$premissa->pre_nome}}</option>
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
                <a style="text-decoration: none;color:white;" href="/permissao/listar">
                    <button type="button" class="btn btn-danger btn-block"><span class="fa fa-check"></span> Cancelar</button>
                </a>
            </div>
        </div>
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
<script>

    $(document).ready(function(){
            $('#premissas').select2({
                theme: 'classic',
                tags: true
            });
            $(".select2-search, .select2-focusser").remove();
            
        });
</script>