@extends('adminlte::page')

@section('content-title', 'Nova Equipe')

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12 card">
        <div class="card-header">
            <h3 class="card-title">Equipes</h3>
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
                        <th>Nome</th>
                        <th>Data Criação</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $equipes as $equipe )
                        <tr>
                            <td id='equipe_id'>{{$equipe->equ_id}}</td>
                            <td>{{$equipe->equ_nome}}</td>
                            <td>{{$equipe->equ_criado_em}}</td>
                            <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                                  Editar
                                </button>
                            </td>                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" id='myModal' role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Equipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('equipes.editar')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12" >
                            <label for="cpf">ID Equipe</label>
                            <input type="text" disabled name="id_equipe" id='equipe_id_modal' class="form-control" />
                        </div>
                        <div class="form-group col-md-12" >
                            <label for="cpf">Nome Equipe</label>
                            <input type="text" name="nome_equipe" class="form-control" value="" />
                        </div>
                        <div class="form-group col-md-12" >
                            <label for="cpf">Membros Equipe</label>
                            <select multiple type="select" name="nome_equipe" class="form-multi-select" value="">
                                @foreach ( $membros as $membro )
                                <option value="{{$membro->usu_id}}">{{$membro->usu_nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" id='salvar' class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>


    $('#myModal').on('shown.bs.modal', function (event) {
        $(this).find('#equipe_id_modal').val(1);
        $('#myInput').trigger('focus');
    });
    
</script>
@endpush


