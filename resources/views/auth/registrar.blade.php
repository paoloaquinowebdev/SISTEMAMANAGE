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


              </div>
              <div class="card-body">

                <div class="card">
                  <div class="card-body register-card-body">
                    <span hidden> <p class="login-box-msg">{{ __('Register') }}</p></span>
                   

                    <form action="{{ URL::to('usuario/add') }}" method="post">
                      @csrf
                      <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Ingrese su Nombre" required autofocus> @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
                        <div class="input-group-append">
                          <span class="fa fa-user input-group-text"></span>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <input id="lastname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('name') }}" placeholder="Ingrese sus Apellidos" required autofocus> @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('lastname') }}</strong>
                        </span> @endif
                        <div class="input-group-append">
                          <span class="fa fa-user input-group-text"></span>
                        </div>
                      </div>

                      <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
                        <div class="input-group-append">
                          <span class="fa fa-envelope input-group-text"></span> @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span> @endif
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                        <div class="input-group-append">
                          <span class="fa fa-lock input-group-text"></span>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir Contraseña" required>
                        <div class="input-group-append">
                          <span class="fa fa-lock input-group-text"></span> @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span> @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <button type="submit" class="btn btn-primary btn-flat">Register</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    <!-- <div class="social-auth-links text-center">
                      <p>- OR -</p>
                      <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook-f mr-2"></i>
                        Sign up using Facebook
                      </a>
                      <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus-g mr-2"></i>
                        Sign up using Google+
                      </a>
                    </div> -->

                    <!-- <a href="{{route('login')}}" class="text-center">I already have a membership</a> -->
                  </div>
                  <!-- /.form-box -->
                </div>
                <!-- /.card -->

                <!-- /.register-box -->




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