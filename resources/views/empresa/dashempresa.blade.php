@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset("/dist/plugins/datatables/dataTables.bootstrap4.css")}}">
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ URL::to('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Empresa Datos</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <div class="m-auto">

            <div class="card">
              <div class="card-header">
                <i class="fas fa-university"></i> Detalle de Empresa
              </div>
              <div class="card-body">


                <div class="card mb-5">
                  <div class="card-header">
                    <i class="fas fa-university"></i> Actualizar Empresa

                  </div>
                  <div class="card-body " id="">
                    <form class="form-horizontal" method="post" action="{{ URL::to('empresa/addempresa') }}">
                      {{ csrf_field() }}

                      <div class="form-group">

                        <label for="empresa" class="col-sm-2 control-label">Nombre Empresa </label>

                        <div class="col-sm-12">
                          <input type="text" class="form-control"  placeholder="empresa" name="empresa" value="{{$data->empresa->nomemp}}">
                        </div>
                      </div>
                      <div class="form-group">

                        <label for="ruc" class="col-sm-2 control-label">R.U.C </label>

                        <div class="col-sm-12">
                          <input type="text" class="form-control"  placeholder="ruc"  name="ruc" value="{{$data->empresa->ruc}}">
                        </div>
                      </div>
                      <div class="form-group">

                        <label for="telefono" class="col-sm-2 control-label">Telefono</label>

                        <div class="col-sm-12">
                          <input type="text" class="form-control"  placeholder="telefono"  name="telefono" value="{{$data->empresa->telef1}}">
                        </div>
                      </div>
                      <div class="form-group">

                        <label for="correo" class="col-sm-2 control-label">Correo</label>

                        <div class="col-sm-12">
                          <input type="text" class="form-control"  placeholder="correo"  name="correo" value="{{$data->empresa->mailemp}}">
                        </div>
                      </div>
                      <div class="form-group">

                        <label for="direccion" class="col-sm-2 control-label">Dirección </label>

                        <div class="col-sm-12">
                          <textarea type="textarea" name="direccion" class="form-control" placeholder="direccion" required >{{$data->empresa->diremp}}</textarea>
                        </div>
                      </div>


                      <!-- /.box-body -->
                      <div class="box-footer">

                        <button type="submit" class="btn btn-info pull-right">Guardar</button>
                      </div>
                      <!-- /.box-footer -->
                    </form>
                  </div>
                </div>



              </div>







              <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
          </div>
        </div>
      </div>

      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- jQuery -->
<script src="{{asset("/dist/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("/dist/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<script src="{{asset("/dist/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("/dist/plugins/datatables/dataTables.bootstrap4.js")}}"></script>

<script src="{{asset("/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>

<script src="{{asset("/dist/js/adminlte.js")}}"></script>

<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@stop