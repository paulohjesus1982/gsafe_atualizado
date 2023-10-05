@extends('adminlte::page')

@section('content-title', 'Editar Paralização')

@section('content-path')

@endsection

@section('content')

<form >
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2>Detalhes da Paralização</h2>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/paralizacao/listar">Listar</a></li>
            <li class="breadcrumb-item active">Detalhes da Paralização</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
      <!-- Default box -->
      <div class= "card card-info">
        <div class="card-header">
          <h3 class="card-title">Paralização de Número  -  000125 </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">

                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Código PET</span>
                      <span class="info-box-number text-center text-muted mb-0">pet- 125639</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Código ART</span>
                      <span class="info-box-number text-center text-muted mb-0">art-186479</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Premissas</h4>
                    <div class="post">
                      <div >
                        <span class="username">
                          <a href="#">TRABALHO A QUENTE: </a>
                        </span>
                        <span class="description">USO DE PORTETOR FACIAL - aberto as 7:45 PM - Fechado as 8:12 PM </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Proporcionam proteção total da face e dos olhos de acordo com a sua adequação e área de uso. São leves, confortáveis e permitem o uso com outros EPIs. Proteção da face contra impactos de partículas volantes.
                      </p>

                      <p>
                        <a href="../img/img.jpg" class="link-black text-sm"><i class="fas fa-link mr-1"></i> EVIDÊNCIA</a>
                      </p>
                    </div>

                    <div class="post clearfix">

                      <div class="post">
                        <div >
                          <span class="username">
                            <a href="#">TRABALHO EM ALTURA: </a>
                          </span>
                          <span class="description">LIBERAÇÃO DO ANDAIME - aberto as 7:55 PM - EM ABERTO </span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Os andaimes devem possuir registro formal de liberação de uso assinado por profissional qualificado em segurança do trabalho ou pelo responsável pela frente de trabalho ou da obra.
                        </p>

                        <p>

                        </p>
                      </div>
                    </div>

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class=""></i> VOGETTA MONTAGEM</h3>

              <div class="text-muted">
                <p class="text-sm">Empresa Terceirizada
                  <b class="d-block">CNPJ:83.904.591/0001-59 </b>
                </p>
                <p class="text-sm">Responsável Técnico
                  <b class="d-block">PAULO H JESUS</b>
                </p>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>paulo@vogetta.com.br</a>
                </li>
              </div>

              <h5 class="mt-5 text-muted">Documentos sobre a Paralização</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="../img/pt.jpg" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> art-186479</a>
                </li>
                <li>
                    <a href="../img/pt.jpg" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> pet- 125639</a>
                  </li>

              </ul>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
</form>

@endsection

@push('scripts')

@endpush
