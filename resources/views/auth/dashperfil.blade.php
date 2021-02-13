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
            <li class="breadcrumb-item active">Lista de Perfiles</li>
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
                <i class="fas fa-university"></i> Lista de Perfiles
                
              </div>
              <div class="card-body">

              <div class="card mb-5">
                  <div class="card-header">
                    Nuevo Perfil
                    <span class="pull-right">
                      <a data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample"><i class="fas fa-plus-circle"></i> Agregar</a></span>
                  </div>
                  <div class="card-body collapse @if(isset($data->categoria)) show @endif" id="collapseExample">
                  @if(isset($data->categoria))  
                  <form class="form-horizontal" method="post" action="{{ URL::to('categoria/edit').'/'.$data->categoria->codcat }}">
                    @else 
                    <form class="form-horizontal" method="post" action="{{ URL::to('usuario/perfil/add') }}">
                    @endif
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label for="Descripcion" class="col-sm-2 control-label">Descripcion </label>

                        <div class="col-sm-12">
                          <textarea type="textarea" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" required>@if(isset($data->categoria)) {{$data->categoria->descat}} @endif</textarea>
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




                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr role="row">
                    <th>id</th>
                      <th>Perfil</th>
                      <th>Habilitado</th>
                      <th>Usuarios</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $perfil)
                    <tr>
                    <td style="width: 50px" class="text-center">{{$perfil->id}}</td>
                      <td>{{$perfil->descripcion}}</td>
                      <td style="width: 50px" class="text-center">
                      @if($perfil->estado == 1)
                      <a href="#" class="edit"><i class="fas fa-check-circle fa-2x"></i></a>
                       @else 
                       <a href="#" class="edit"><i class="fas fa-check-circle fa-2x" style="color: lead"></i></a>
                       @endif 


                      </td>
                      <td style="width: 50px" class="text-center"><a href="{{ URL::to('usuario/perfil/users').'/'. $perfil->id }}" ><i class="fas fa-users fa-2x "  ></i></a></td>
                      <td style="width: 50px" class="text-center"><a href="" class="edit"><i class="fas fa-edit fa-2x " style="color:#ffc107" ></i></a></td>
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