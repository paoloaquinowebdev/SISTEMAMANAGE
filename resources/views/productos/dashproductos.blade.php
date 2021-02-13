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
            <li class="breadcrumb-item active">Lista de Productos</li>
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
                <i class="fas fa-university"></i> Lista de Productos
                <span class="pull-right"><a href="{{ URL::to('productos/newproducto') }}"><button type="button" class="btn btn-primary">Agregar</button></a></span>
                
              </div>
              <div class="card-body">

              
              <div class="table-responsive">
               <div class="col-sm-6 m-2">
                <input type="text" class="buscar form-control" id="buscar" placeholder="Buscar">
               </div> 
              

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr role="row">

                      <th>Codigo</th>
                      <th>Producto</th>
                      <th>Categoria</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Precio 1</th>
                      <th>Stock</th>
                      <th>Precio compra</th>
                      <th>Editar</th>
                      <!-- <th>Eliminar</th>-->
                    </tr>
                  </thead>
                  <tbody class="datos">
                  
                    @foreach ($data as $productos)
                  
                      <tr >
                        <td>{{$productos->nropro}}</td>
                        <td>{{$productos->despro}}</td>
                        <td>{{$productos->descat}}</td>
                        <td>{{$productos->marca}}</td>
                        <td>{{$productos->modelo}}</td>
                        <td>{{$productos->pre1}}</td>
                        <td>{{$productos->stock}}</td>
                        <td>{{$productos->pre6}}</td>
                        <td class="text-center"><a href="{{ URL::to('productos/edit').'/'. $productos->codpro }}"><i class="fas fa-edit fa-2x " style="color:#ffc107" ></i></a></td>
                        <!--<td class="text-center"><i class="fas fa-trash delete fa-2x " title="Eliminar" data-id="" style="color:#dc3545" ></i></td>
                      -->
                      </tr>
                    
                    @endforeach
               
                  </tbody> 
                  
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

  $(document).on("keyup", ".buscar", function() {

    var valor = $(this).val();
    obtener_productos(valor);

  });

  $(document).on("click", ".delete", function(event) {

    var id = $(this).data('id');
    // alert(id);
    // return false;
    eliminar_producto(id);
    event.preventDefault();
    $(this).closest('tr').remove();

  });

 


  function obtener_productos(valor) {
    var request = $.ajax({
      async: true,
      type: "POST",
      data: {
        "_token": "{{ csrf_token() }}",
        "valor": valor


      },
      url: "{{ URL::to('productos/obtenerproducto') }}"
    });

    request.done(function(data) {
      $('.datos').html('');

      $('.datos').html(data);

      // console.log(data);

    });

    request.fail(function(jqXHR, textStatus) {
      console.log(jqXHR);
    });
  }

  function eliminar_producto(id) {
    var request = $.ajax({
      async: true,
      type: "POST",
      data: {
        "_token": "{{ csrf_token() }}",
        "id": id


      },
      url: "{{ URL::to('productos/delete') }}"
    });

    request.done(function(data) {
      // $('.datos').html('');
      // $('.datos').html(data);
      alert("Eliminado satisfactoriamente");
      console.log(data);
     
     

    });

    request.fail(function(jqXHR, textStatus) {
      console.log(jqXHR);
    });
  }





</script>
@stop