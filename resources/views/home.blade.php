@extends('adminlte::page')

@section('title', 'GSAFE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$total_paralizacoes}}</h3>

          <p>Paralizações</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$porcentagem_fechados}}<sup style="font-size: 20px">%</sup></h3>

          <p>Paralizações Fechadas</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$abertas}}</h3>

          <p>Paralizações em Andamento</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$premissas_abertas}}</h3>

          <p>Premissas Abertas</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-12">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="card-title">Comparativo Atividades</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Em breve</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="165" ></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card card-primary" >
              <div class="card-header">
                <h5 class="card-title">Ranking Permissões</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p class="text-center">
                      <strong>Acompanhamento</strong>
                    </p>
                    <?php 
                      $i = 0;

                      $array_cor = [
                        0 => 'danger',
                        1 => 'success',
                        2 => 'warning',
                        3 => 'primary',
                      ];
                    ?>
                    @foreach ($ranking_permissoes as $permissao_paralizacao)
                    <?php
                    if($total_permissoes_paralizacoes > 0 ){
                      $porcentagem  = $permissao_paralizacao->quantidade / $total_permissoes_paralizacoes * 100;
                    }
                    ?>
                    <div class="progress-group">
                      {{$permissao_paralizacao->per_nome}}
                      <span class="float-right"><b>{{$permissao_paralizacao->quantidade}}</b>/{{$total_permissoes_paralizacoes}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-{{$array_cor[$i]}}" style="width: {{$porcentagem}}%"></div>
                      </div>
                    </div>
                    <?php
                      $i++;
                      if ($i == 4) {
                        $i = 0;
                      }
                    ?>
                    @endforeach
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          </div>
    </div>
</div>

<!-- Paralizacoes diária -->
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header border-transparent">
          <h3 class="card-title">Resumo Paralizações</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>ART / PT</th>
                <th>Premissa</th>
                <th>Empresa</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($paralizacoes_diarias as $paralizacao)                    
                <tr>
                  <td><a href="/paralizacao/listar_permissao/{{$paralizacao->ppre_fk_par_id}}">{{$paralizacao->par_art}}/{{$paralizacao->par_pet}}</a></td>
                  <td>{{$paralizacao->pre_nome}}</td>
                  <td>{{$paralizacao->emp_nome}}</td>
                  <td><span class="badge badge-{{$paralizacao->ppre_status == 1 ? 'danger' : 'success'}}">{{$paralizacao->ppre_status == 1 ? 'Paralizado' : 'Liberado'}}</span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="/paralizacao/cadastrar" class="btn btn-sm btn-info float-left">Nova Paralização</a>
          <a href="/paralizacao/listar" class="btn btn-sm btn-secondary float-right">Ver todas </a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    {{-- <div class="col-md-4">
      <!-- Info Boxes Style 2 -->

      <!-- /.info-box -->

      <!-- /.info-box -->

      <!-- /.info-box -->

      <!-- /.info-box -->

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Premissas com MAIOR ocorrência</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-10">
              <div class="chart-responsive">
                <canvas id="pieChart" height="150"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <ul class="chart-legend clearfix">
                <li><i class="far fa-circle text-danger"></i> Liberação do andaime</li>
                <li><i class="far fa-circle text-success"></i> Vestimentas de proteção conforme NR 10</li>
                <li><i class="far fa-circle text-warning"></i> Uso de EPIs para o trabalho</li>
                <li><i class="far fa-circle text-info"></i> Bloqueio de energias perigosas</li>
                <li><i class="far fa-circle text-primary"></i> Check list do guindaste</li>
                <li><i class="far fa-circle text-secondary"></i> Bloqueio de energias perigosas</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer p-0">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="nav-link">
                EMPRESA A
                <span class="float-right text-danger">
                  <i class="fas fa-arrow-down text-sm"></i>
                  12%</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
               EMPRESA B
                <span class="float-right text-success">
                  <i class="fas fa-arrow-up text-sm"></i> 4%
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                EMPRESA C
                <span class="float-right text-warning">
                  <i class="fas fa-arrow-left text-sm"></i> 0%
                </span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.card -->

      <!-- PRODUCT LIST -->

      <!-- /.card -->
    </div> --}}
    <!-- /.col -->
  </div>
@stop