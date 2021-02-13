@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset("/dist/plugins/datatables/dataTables.bootstrap4.css")}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .js-example-basic-single {
    width: auto;
  }

  .select2-selection--single {
    height: 38px !important;
  }

  .select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 0px !important ;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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
            <li class="breadcrumb-item active">Lista de Clientes</li>
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
                <i class="fas fa-university"></i> Lista de Clientes
              </div>
              <div class="card-body">
                <form class="form-horizontal" id="form_ruc" method="POST" action="{{ URL::to('cliente/registrar')}}">
                  {{ csrf_field() }}

 <!--
                  <div class="form-group">
                    <label for="categoria" class="col-sm-2 control-label">categoria</label>
                    <div class="col-sm-3">
                       <select class="form-control" id="categoria" name="categoria">

                        <option value="1">DNI</option>
                        <option value="1">RUC</option>

                      </select> 
                    </div> 
                  </div>-->
                  <div class="form-group row">
                    <label for="codigo" class="col-sm-2 control-label">Nro Ruc</label>

                    <div class="col-sm-3">
                    <input type="number" placeholder="Ingrese DNI" name="numero" id="numero" class="form-control" required="">
                    </div>

                    <div class="col-sm-7 ">
                        
                        <a href="#" id="search_button" class="btn btn-primary pull-right" onclick="search_dni(this); return false;"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>

                    
                  </div>

                  <div class="form-group">
                    <label for="codigo" class="col-sm-2 control-label">Razon social</label>
                    <div class="col-sm-10">
                    <input type="text" name="nombre_complet" id="nombre_complet" class="form-control" required="" placeholder="Nombre o razon social">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion" class="col-sm-2 control-label">Direccion </label>

                    <div class="col-sm-10">
                    <input type="text" name="direccion" id="direccion" class="form-control" required="" placeholder="direccion">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label for="Descripcion" class="col-sm-2 control-label">Departamento </label>

                    <div class="col-sm-10">
                    <input type="text" name="departamento" id="departamento" class="form-control" required="" placeholder="Departamento">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="Descripcion" class="col-sm-2 control-label">Distrito </label>

                    <div class="col-sm-10">
                    <input type="text" name="distrito" id="distrito" class="form-control" required="" placeholder="Distrito">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="Descripcion" class="col-sm-2 control-label"> Provincia</label>

                    <div class="col-sm-10">
                    <input type="text" name="provincia" id="provincia" class="form-control" required="" placeholder="Provincia">
                    </div>
                  </div> -->
                  <label for="select-producto" class="col-sm-2 control-label">Ubicacion </label>
                  <div class="form-group ">
                    <div class="col-sm-12 col-md-7 ">
                          <select class="js-example-basic-single" id="select-producto" name="ubicacion">
                            <option value="0" selected disabled>Seleccione Ubicación</option>
                            @foreach($data->ubigeo as $ubigeo)
                            <option value="{{$ubigeo->cod}}">{{$ubigeo->provincia}} - {{$ubigeo->distrito}} - {{$ubigeo->departamento}} </option>
                            @endforeach

                          </select>
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="telefono" class="col-sm-2 control-label">Telefono </label>

                    <div class="col-sm-10">
                    <input type="text" name="telefono" id="telefono" class="form-control" required="" placeholder="Telefono">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="correo" class="col-sm-2 control-label">Correo </label>

                    <div class="col-sm-10">
                    <input type="text" name="correo" id="correo" class="form-control" required="" placeholder="E-mail">
                    </div>
                  </div>



                  <!-- /.box-body -->
                  <div class="box-footer">
                  <!-- <div class="col-sm-2">
                    <a href="#" id="search_button" class="btn btn-primary" onclick="search_dni(this); return false;"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                    <a class="btn btn-info pull-right "  >Guardar</a> -->
                    <input type="submit" class="btn btn-info pull-right " value="Guardar">
                  </div>
                  <!-- /.box-footer -->
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
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

 $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });


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

<script>
(function($){
   $.ajaxblock    = function(){
      $("body").prepend("<div id='ajax-overlay'><div id='ajax-overlay-body' class='center'><i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i><span class='sr-only'>Loading...</span></div></div>");
      $("#ajax-overlay").css({
         position: 'absolute',
         color: '#FFFFFF',
         top: '0',
         left: '0',
         width: '100%',
         height: '100%',
         position: 'fixed',
         background: 'rgba(39, 38, 46, 0.67)',
         'text-align': 'center',
         'z-index': '9999'
      });
      $("#ajax-overlay-body").css({
         position: 'absolute',
         top: '40%',
         left: '50%',
         width: '120px',
         height: '48px',
         'margin-top': '-12px',
         'margin-left': '-60px',
         //background: 'rgba(39, 38, 46, 0.1)',
         '-webkit-border-radius':   '10px',
         '-moz-border-radius':      '10px',
         'border-radius':        '10px'
      });
      $("#ajax-overlay").fadeIn(50);
   };
   $.ajaxunblock  = function(){
      $("#ajax-overlay").fadeOut(100, function()
      {
         $("#ajax-overlay").remove();
      });
   };
})(jQuery);
function search_dni(i){
  $.ajaxblock();
  var numero = $('#numero').val(), url_s = "{{ URL::to('cliente')}}",parametros = {'dni':numero};

  url_s = "https://incared.com/api/apirest";
  parametros = {'action':'getnumero','numero':numero}
  
  if (numero == '') {
    alert("El campo documento esta vacio ");
    $.ajaxunblock();
  }else{
    $.ajax({
        type: 'POST',
        url: url_s,
        dataType:'json',
        data:parametros,
        beforeSend: function(){
        },  
        complete:function(data){
        
        },
        success: function(data){
          $('.before-send').fadeOut(500);
          if(!jQuery.isEmptyObject(data.error)){
            alert(data.error);
          }else{
              $('#nombre_complet').val(data.rs);
              $('#direccion').val( data.tvia + ' ' + data.nvia + " "+data.tzona +" MZA "+data.mz+ " LOTE "+ data.lote);
              if(!jQuery.isEmptyObject(data.distrito) && !jQuery.isEmptyObject(data.departamento)){
                $('#departamento').val(data.departamento.nombre);
                $('#distrito').val(data.distrito.nombre);
                $('#provincia').val(data.provincia.nombre);
              }

          }
          $.ajaxunblock();
        },
        error: function(data){
            alert("Problemas al tratar de enviar el formulario");
            $.ajaxunblock();
        }
    }); 
  }
}
search_tipe();
function search_tipe(){
  if( $('#tipe_search').val() == 'ruc' ) {
      $('#search_button').attr('data-ruc','active');
      $('#numero').attr('placeholder','Buscar ruc');
  } else {
      $('#search_button').removeAttr('data-ruc');
      $('#numero').attr('placeholder','Buscar dni');
  }
}
  
</script>
@stop