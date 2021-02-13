@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset("/dist/plugins/datatables/dataTables.bootstrap4.css")}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
  .js-example-basic-single {
    width: 100%;
  }

  .select2-selection--single {
    height: 38px !important;
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
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Cotización</li>
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
                <i class="fas fa-university"></i> Compras
              </div>
              <div class="card-body">
                <form class="form-horizontal formGestion" method="POST" action="" target="">
                  <div class="card">


                    {{ csrf_field() }}
                    <div class="card-header">
                      <i class="fas fa-user"></i> Dato General
                    </div>
                    <div class="card-body">
                      <div class="form-group row">

                        <label for="codigo" class="col-sm-1 col-form-label">Compra:</label>
                        <div class="col-sm-2">
                          <input type="text" placeholder="Numero Compra" name="numerocompra" id="numerocompra" class="form-control" required>
                        </div>

                        <label for="codigo" class="col-sm-2 col-form-label">Proveedor Doc.:</label>
                        <div class="col-sm-3">
                          <input type="number" placeholder="Ingrese Documento" name="proveedor" class="form-control" required="">
                        </div>


                        <label for="codigo" class="col-sm-1 col-form-label">Fecha:</label>
                        <div class="col-sm-3">
                          <input type="date" placeholder="" name="fecha" class="form-control" required="">
                        </div>


                      </div>


                   
                    </div>


                  </div>

           

              <div class="card">
                <div class="card-header">
                  <i class="fas fa-shopping-basket"></i> Detalle
                </div>
                <div class="card-body">
                  <div class="row mb-4">
                    <div class="col-sm-4">
                      <select class="js-example-basic-single" id="select-producto" name="state">
                        <option value="0" selected disabled>Seleccione</option>
                        @foreach($data->productos as $producto)

                        <option value="{{$producto->nropro}}" data-despro="{{$producto->despro}}" data-precio="{{$producto->pre1}}" data-unidadmedida="{{$producto->unidadmedida}}">{{$producto->despro}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>

                  <div class="form-group row mb-4">

                    <input type="text" class="form-control" id="idpro" value="1" placeholder="idpro" hidden>
                    <input type="text" class="form-control" id="unidadmedida" value="1" placeholder="unidadmedida" hidden>
                    <label for="precio" class="col-sm-1 col-form-label">Precio:</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="precio" value="10" placeholder="Precio">
                    </div>
                    <label for="cantidad" class="col-sm-1 col-form-label">Cant:</label>
                    <div class="col-sm-2">
                      <input type="number" class="form-control" id="cantidad" placeholder="Cantidad" value="1">
                    </div>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="descripcion" placeholder="cantidad" hidden value="RODAJE">
                      <button type="button" class="btn btn-primary float-right mt-2" onclick="agregarFila()">Agregar</button>
                    </div>
                  </div>
                  <div class="table-responsive">

                    <table class="table table-bordered table-sm" id="tablaprueba">
                      <thead class="thead-dark">
                        <tr>
                          <th style="width:300px">Descripcion</th>
                          <th style="width:200px">Precio Unitario</th>
                          <th style="width:100px">Cantidad</th>
                          <th style="width:200px">Importe</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody></tbody>

                    </table>


                    <table class="table table-bordered table-sm footer-table" id="tablaprueba">

                      <tbody>
                        <td style="width:300px"></td>
                        <td style="width:200px"></td>
                        <td style="width:100px">Total</td>
                        <td class="text-right" style="width:200px"><input type="text" class="form-control" id="total_imp" name="total_imp" placeholder="total"></td>
                        <td style="width:70px"></td>
                      </tbody>

                    </table>
                  </div>

                </div>

                <div class="card-footer">
                  <a href="#" class="btn btn-danger pull-right guardarcompra"  data-id="{{ URL::to('ventas/compras')}}"> Guardar2</a>

                </div>

                </form>
              </div>
            </div>

          </div>
        </div>
      </div>


    </div>

  </section>
  <!-- /.content -->
</div>


<div class="modal" id="procesando" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Obteniendo datos de SUNAT</h5>
      </div>
      <div class="modal-body">
        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- jQuery -->
<script src="{{asset("/dist/plugins/jquery/jquery.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
  $('.consultar').click(function() {
    // $('.formGestion').attr('action', $(this).attr('data-id'));
    // $('.formGestion').submit();

    var documento = $("#ruc").val();

    if (documento.length < 11 || documento == "") {
      alert("ingrese un ruc valido");
      return false;
    } else {
      consulta_cliente(documento);
    }

    $('#procesando').modal('show');

  });

  $('.guardarcompra').click(function() {
    var compra = $('#numerocompra').val();
    $('.formGestion').attr('action', $(this).attr('data-id'));
    if(compra == "" || compra == "null"){
      alert("ingrese el numero de compra")
      return false;
    }
    //$('.formGestion').attr("target", "_blank")
    $('.formGestion').submit();
  });


  $('#select-producto').change(function() {
    var id = $(this).val();
    var descripcion = $(this).select2().find(":selected").data("despro");
    var precio = $(this).select2().find(":selected").data("precio");
    var unidadmedida = $(this).select2().find(":selected").data("unidadmedida");

    $("#idpro").val(id);
    $("#precio").val(precio);
    $("#descripcion").val(descripcion);
    $("#unidadmedida").val(unidadmedida);
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  $(document).on('click', '.borrar', function(event) {

    var id = $(this).data('id');
    var importe = $("#importe" + id).val();

    var total = $("#total_imp").val();
    var totalnew = total - importe;

    var total = Number(totalnew);
    // return false;
    // alert(total); return false;
    $("#total_imp").val(total.toFixed(2));

    event.preventDefault();
    $(this).closest('tr').remove();

  });

  function agregarFila() {

    var idpro = $("#idpro").val();
    var unidadmedida = $("#unidadmedida").val();
    var precio = $("#precio").val();
    var descrip = $("#descripcion").val();
    var cantidad = $("#cantidad").val();

    var totalacum = $("#total_imp").val();
    //$("#total_imp").val(total.toFixed(2))  ;


    var table = document.getElementById("tablaprueba");
    var rowCount = table.rows.length;
    //console.log(rowCount);

    // alert(rowCount); return false;

    // if (rowCount <= 1)
    //   alert('No se puede eliminar el encabezado');
    // else
    //   table.deleteRow(rowCount - 1);


    var importe = precio * cantidad;

    var total = Number(totalacum) + importe;


    document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td style="display:none;"><input class="form-control input-sm" type="text" name=idpro[] value="' + idpro + '" ></td><td style="display:none;"><input class="form-control input-sm" type="text" name=unidadmedida[] value="' + unidadmedida + '" ></td><td style="width:300px"><input class="form-control input-sm" type="text" name=descripcion[] value="' + descrip + '" ></td><td style="width:200px"><input class="form-control input-sm" type="text" name=precio[] value="' + precio + '" ></td><td style="width:100px"> <input class="form-control input-sm" type="text" name="cantidad[]" value="' + cantidad + '" ></td><td class="text-right" style="width:200px"><input class="form-control input-sm" type="text" id="importe' + rowCount + '" name="importe[]" value="' + importe.toFixed(2) + '" ></td><td class="text-center"  style="width:50px"><a data-id="' + rowCount + '" class="borrar btn btn-warning fa-2x"/><i class="fas fa-trash-alt"></i></a></td>';

    $("#total_imp").val(total.toFixed(2));

  }

  function eliminarFila() {

    var table = document.getElementById("tablaprueba");
    var rowCount = table.rows.length;
    //console.log(rowCount);

    if (rowCount <= 1)
      alert('No se puede eliminar el encabezado');
    else
      table.deleteRow(rowCount - 1);
  }


  function consulta_cliente(documento) {

    var request = $.ajax({
      async: true,
      type: "POST",
      data: {
        "_token": "{{ csrf_token() }}",
        "ruc": documento
      },
      url: "{{ URL::to('ventas/clienteruc') }}"
    });

    request.done(function(data) {

      var data = JSON.parse(data);
      $('#procesando').modal('hide');
      $("#razon").val("");
      $("#razon").val(data.razon_social);
      $("#direccion").val("");
      $("#direccion").val(data.direccion);

      console.log(data);
      return false;

    });

    request.fail(function(jqXHR, textStatus) {
      console.log(jqXHR);

    });
  }
</script>

<script>
  (function($) {
    $.ajaxblock = function() {
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
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        'border-radius': '10px'
      });
      $("#ajax-overlay").fadeIn(50);
    };
    $.ajaxunblock = function() {
      $("#ajax-overlay").fadeOut(100, function() {
        $("#ajax-overlay").remove();
      });
    };
  })(jQuery);

  function search_dni(i) {
    $.ajaxblock();
    var numero = $('#numero').val(),
      url_s = "{{ URL::to('cliente')}}",
      parametros = {
        'dni': numero
      };

    url_s = "https://incared.com/api/apirest";
    parametros = {
      'action': 'getnumero',
      'numero': numero
    }

    if (numero == '') {
      alert("El campo documento esta vacio ");
      $.ajaxunblock();
    } else {
      $.ajax({
        type: 'POST',
        url: url_s,
        dataType: 'json',
        data: parametros,
        beforeSend: function() {},
        complete: function(data) {

        },
        success: function(data) {
          $('.before-send').fadeOut(500);
          if (!jQuery.isEmptyObject(data.error)) {
            alert(data.error);
          } else {

            if (!data.tzona == "-") {
              var mz = " MZA ";
              var lot = " LOTE ";

            } else {
              var mz = "";
              var lot = "";
              data.tzona = "";
              data.mz = "";
            }

            $('#nombre_complet').val(data.rs);
            $('#direccion').val(data.tvia + ' ' + data.nvia + " " + data.numero + data.tzona + mz + data.mz + lot + data.lote);
            if (!jQuery.isEmptyObject(data.distrito) && !jQuery.isEmptyObject(data.departamento)) {
              $('#departamento').val(data.departamento.nombre);
              $('#distrito').val(data.distrito.nombre);
              $('#provincia').val(data.provincia.nombre);
            }

          }
          $.ajaxunblock();
        },
        error: function(data) {
          alert("Problemas al tratar de enviar el formulario");
          $.ajaxunblock();
        }
      });
    }
  }
  search_tipe();

  function search_tipe() {
    if ($('#tipe_search').val() == 'ruc') {
      $('#search_button').attr('data-ruc', 'active');
      $('#numero').attr('placeholder', 'Buscar ruc');
    } else {
      $('#search_button').removeAttr('data-ruc');
      $('#numero').attr('placeholder', 'Buscar dni');
    }
  }
</script>



@stop