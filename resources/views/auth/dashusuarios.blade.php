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
            <li class="breadcrumb-item active">Lista de Usuarios</li>
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
                <i class="fas fa-university"></i> Lista de Usuarios
                <span class="pull-right"><a href="{{ URL::to('usuario/registrar') }}"><button type="button" class="btn btn-primary">Agregar</button></a></span>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered dataTable no-footer">
                    <thead>
                      <tr role="row">
                        <th>User</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Perfil</th>
                        <th>Editar</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $usuario)
                      <tr>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->lastname}}</td>
                        <td>@if(isset($usuario->descripcion)) {{$usuario->descripcion}} @else No Asignado @endif</td>
                        <td style="width: 50px" class="text-center"><a href="" class="edit"><i class="fas fa-edit fa-2x " style="color:#ffc107"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                    <!-- <tfoot>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </tfoot> -->
                  </table>
                </div>
              </div>
            </div>







            <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->

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