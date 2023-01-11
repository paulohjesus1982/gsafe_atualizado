@extends('adminlte::page')

@section('content-title', 'Listar Paralizações')

@section('content_header')
    <div class="row">
        <div class="col-11">
            <h1 class="m-0 text-dark">Paralizações</h1>
        </div>
        <div class="col-1">
            <a href="/paralizacao/cadastrar"class="btn btn-app bg-success">
                <i class="fas fa-users"></i> Cadastrar
            </a>
        </div>
    </div>
@stop

@section('content')
{{ csrf_field()}}

<div class="row">
    <div class="col-12">
        <div class= "card card-info">
            <div class="card-header">
                <h3 class="card-title">Paralizações</h3>
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
                            <th>PET</th>
                            <th>ART</th>
                            <th>Empresa</th>
                            <th>Status</th>
                            <th>Profissional</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                000125
                            </td>
                            <td>
                                <a>
                                    pet- 125639
                                </a>
                            </td>
                            <td>
                                <a>
                                    art-186479
                                </a>
                            </td>
                            <td>
                                <a>
                                  VOGETTA MONTAGENS
                                </a>
                                </ul>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">EM ABERTO</span>
                            </td>
                            <td class="project-state">
                                <a>
                                    BARBARA
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/paralizacao/mostrar">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="/paralizacao/cadastrar">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-alert btn-sm" href="/paralizacao/cadastrar">
                                    <i class="fas fa-check">
                                    </i>
                                    Fechar
                                </a>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                000133
                            </td>
                            <td>
                                <a>
                                    pet- 125639
                                </a>
                            </td>
                            <td>
                                <a>
                                    art-186479
                                </a>
                            </td>
                            <td>
                                <a>
                                  VOGETTA MONTAGENS
                                </a>
                                </ul>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-primary">FECHADO</span>
                            </td>
                            <td class="project-state">
                                <a>
                                    BARBARA
                                </a>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/paralizacao/mostrar">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="/paralizacao/cadastrar">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-alert btn-sm" href="/paralizacao/cadastrar">
                                    <i class="fas fa-check">
                                    </i>
                                    Fechar
                                </a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
