@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-info">
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
              <div class="dropdown-menu dropdown-menu-right" role="menu">
                <a href="#" class="dropdown-item">Action</a>
                <a href="#" class="dropdown-item">Another action</a>
                <a href="#" class="dropdown-item">Something else here</a>
                <a class="dropdown-divider"></a>
                <a href="#" class="dropdown-item">Separated link</a>
              </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Acompanhamento</strong>
              </p>

              <div class="progress-group">
                Trabalho a Quente
                <span class="float-right"><b>160</b>/200</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Trabalho em Altura
                <span class="float-right"><b>310</b>/400</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 75%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Serviços em Equipamentos com Fonte Radiotiva Fixa</span>
                <span class="float-right"><b>480</b>/800</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning"  style="width: 60%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Elevação de Cargas
                <span class="float-right"><b>250</b>/500</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 50%"></div>
                </div>
              </div>
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


<div class="row">
    <!-- Left col -->
    <div class="col-md-8">



      <!-- TABLE: LATEST ORDERS -->
      <div class="card card-primary">
        <div class="card-header border-transparent">
          <h3 class="card-title">Paralizações do Dia</h3>

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
                <th>ID</th>
                <th>T. Permissão</th>
                <th>Empresa</th>
                <th>Status</th>
                <th>Profissional</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="pages/examples/invoice.html">PT-9842</a></td>
                <td>Trabalho a Quente</td>
                <td>Empresa A</td>
                <td><span class="badge badge-success">Liberado</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">Barbara / Jorge</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">PT-7429</a></td>
                <td>Trabalho em Altura</td>
                <td>Empresa B</td>
                <td><span class="badge badge-danger">Paralizado</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">Marlon</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">PT-7429</a></td>
                <td>Trabalho em Altura</td>
                <td>Empresa B</td>
                <td><span class="badge badge-danger">Paralizado</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">José</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">PT-9842</a></td>
                <td>Trabalho em Altura</td>
                <td>Empresa A</td>
                <td><span class="badge badge-success">Liberado</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">Pedro</div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Nova Paralização</a>
          <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Ver todas </a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
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
    </div>
    <!-- /.col -->
  </div>
@stop
