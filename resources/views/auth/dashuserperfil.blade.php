@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset("/dist/plugins/datatables/dataTables.bootstrap4.css")}}">
<style>
    .correoe:before{
      content: "\f2be";
      font-family: 'FontAwesome';
      margin-right: 5px;
    }
</style>
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
                <i class="fas fa-university"></i> Lista de Usuarios por Perfil

              </div>
              <div class="card-body">
                
                <form class="form-horizontal" method="post" action="{{ URL::to('usuario/perfil/adduser').'/'. $data->id }}">
                      {{ csrf_field() }}

                <table class="table table-condensed">
                  <tbody>
                    <tr>
                      <td id="existingcell" style="width:45%;">
                        <p>
                          <label for="removeselect">Usuarios Incluidos</label>
                        </p>
                        <div class="userselector" id="removeselect_wrapper">
                          <select name="removeselect[]" id="removeselect" multiple="multiple" size="20" style="width:100%;">
                            <optgroup label="Seleccionados {{ $data->tot_incluidos}}">
                              @foreach($data->incluidos as $user)
                                <option value="{{$user->id}}" class="correoe">
                                <i class="fas fa-user"> </i>{{$user->lastname .', '. $user->name }}
                                </option>
                              @endforeach

                            </optgroup>
                          </select>
                        </div>
                      </td>
                      <td id="buttonscell" style="width:10%;vertical-align:middle;">
                        <p class="arrow_button">
                          <input style="font-family: FontAwesome;width:100%;" class="btn btn-primary" name="add" id="add" type="submit" value="&#xf100;" title="Agregar"><p>
                          <input style="font-family: FontAwesome;width:100%;" class="btn btn-reset" name="remove" id="remove" type="submit" value="&#xf101;" title="Quitar">
                        </p>
                      </td>
                      <td id="potentialcell" style="width:45%;">
                        <p>
                          <label for="addselect">Todos los Usuarios</label>
                        </p>
                        <div class="userselector" id="addselect_wrapper">
                          <select name="addselect[]" id="addselect" multiple="multiple" size="20" style="width:100%;">
                          <optgroup label="Usuarios {{$data->tot_users}}">
                              @foreach($data->users as $user)
                                <option value="{{$user->id}}" class="correoe">
                              {{$user->lastname .', '. $user->name }}
                                </option>
                              @endforeach
                            </optgroup>
                          </select>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

                </form>

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