@extends('layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .js-example-basic-multiple {
        width: 100%;
    }

    .select2-selection--single {
        height: 38px !important;
    }
</style>


<style>
    .form-label-group {
        position: relative;
    }

    .form-label-group-select {
        position: relative;
        padding-left: 0.375rem !important;
    }

    .form-label-group-select select {
        height: 60px !important;
    }

    .form-label-group-area {
        position: relative;

    }

    .form-label-group-area select {
        height: 60px !important;
        padding-left: 0.375rem !important;
    }

    .form-label-group>input,
    .form-label-group>label {
        padding-top: 1.5rem;
        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.375rem;
    }

    .form-label-group-datetime>input

    /* ,
    .form-label-group-datetime > label*/
        {
        padding-top: 1.5rem;
        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.375rem;
    }

    .form-label-group-datetime>label {

        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.375rem;
    }

    .form-label-group-select>label {
        padding-top: 0px;
        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.75rem !important;
    }

    .form-label-group-select>select {
        padding-top: 1.5rem;
        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.175rem;
    }

    .form-label-group-area>textarea {
        padding-top: 1.5rem;
        padding-right: 0.375rem;
        padding-bottom: 0.375rem;
        padding-left: 0.375rem !important;
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group-select>label {
        position: absolute;
        top: 0;
        padding-left: 0.75rem !important;
        left: 0;
        display: block;
        opacity: 0.5;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group-datetime>label {
        position: absolute;
        top: 0px;
        display: block;
        opacity: 0.5;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group-area>label {
        position: absolute;
        top: 0;
        padding-left: 0.375rem !important;
        padding-top: calc(.75rem / 3);
        padding-bottom: calc(.75rem / 3);
        font-size: 16px;
        color: #777;
        display: block;
        opacity: 0.5;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(.75rem / 3);
        padding-bottom: calc(.75rem / 3);
        font-size: 12px;
        color: #777;
    }

    .form-label-group-area input:not(:placeholder-shown)~label {
        padding-top: calc(.75rem / 3);
        padding-left: 0.375rem !important;
        padding-bottom: calc(.75rem / 3);
        font-size: 12px;
        color: #777;
    }

    .select2-container--default .select2-results>.select2-results__options {
        max-height: 500px;
    }
    .select2-selection__choice{
        color: #000 !important ;
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
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(isset($data->producto))

                                        <form class="" method="post" action="{{URL::to('productos/edit').'/'.$data->producto->codpro}}" enctype="multipart/form-data">

                                            @else
                                            <form class="" method="post" action="{{URL::to('productos/add')}}" enctype="multipart/form-data">
                                                @endif
                                                {{ csrf_field() }}

                                                <span class=" flex-direction: row ">
                                                    <div class="col-6">
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <input type="text" class="form-control" id="codigo" name="codigo" value="@if(isset($data->producto)){{$data->producto->nropro}}@endif" placeholder="codigo" required autofocus>
                                                                <label for="codigo">Codigo</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group-area">
                                                                <textarea class="form-control" id="descripcion" rows="2" name="descripcion" required >@if(isset($data->producto)){{$data->producto->despro}}@endif</textarea>
                                                                <label for="descripcion" >Descripción</label>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group col-lg-12">
                                                            <div class="form-label-group">
                                                                <input type="file" name="file" >
                                                            </div>
                                                        </div>

                                                        <div class="form-check m-2">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Combo Producto
                                                            </label>
                                                        </div>
                                                        <div class="select" >
                                                            <select class="js-example-basic-multiple" name="productocombo[]" multiple="multiple" >

                                                                @foreach($data->productos as $producto)
                                                                
                                                                
                                                                <option value="{{$producto->nropro}}" data-despro="{{$producto->despro}}" data-precio="{{$producto->pre1}}" data-unidadmedida="{{$producto->unidadmedida}}" @if(isset($data->comboproductos))
                                                                @foreach($data->comboproductos as $combo)
                                                                @if($combo == $producto->nropro)
                                                                    selected
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                                >{{$producto->nropro}} - {{$producto->despro}}</option>
                                                               
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </span>





                                                <span class=" flex-direction: row">

                                                    <div class="form-group col-lg-6">
                                                        <div class="form-label-group-select">
                                                            <label for="categoria">Categoria</label>
                                                            <select class="form-control crm-combo" id="categoria" data-level="1" id="categoria" name="categoria">
                                                                @foreach ($data->categoria as $categoria)
                                                                <option value="{{$categoria->codcat}}" @if(isset($data->producto))
                                                                    @if($categoria->codcat == $data->producto->codcat)
                                                                    selected
                                                                    @endif
                                                                    @endif >{{$categoria->descat}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <div class="form-label-group-select">
                                                            <label for="unidad_medida">Unidad Medida</label>
                                                            <select class="form-control crm-combo" id="unidad_medida" data-level="1" id="unidad_medida" name="unidad_medida">
                                                                @foreach ($data->unidad_medida as $unidad_medida)
                                                                <option value="{{$unidad_medida->CODIGO}}" @if(isset($data->producto))
                                                                    @if($unidad_medida->CODIGO == $data->producto->unidadmedida)
                                                                    selected
                                                                    @endif
                                                                    @endif >{{$unidad_medida->DESCRIPCION}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </span>
                                                <span class="flex-direction: row" style="padding-left: 0.375rem">
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="marca" name="marca" value="@if(isset($data->producto)){{$data->producto->marca}}@endif" placeholder="marca">
                                                            <label for="marca">Marca</label>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="modelo" name="modelo" value="@if(isset($data->producto)){{$data->producto->modelo}}@endif" placeholder="modelo">
                                                            <label for="modelo">modelo</label>

                                                        </div>
                                                    </div>
                                                </span>

                                                <span class="flex-direction: row" style="padding-left: 0.375rem">

                                                    <div class="form-group col-lg-2">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="stock" name="stock" value="@if(isset($data->producto)){{$data->producto->stock}}@endif" placeholder="stock" required>
                                                            <label for="stock">stock</label>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-4">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control preciocompra" id="preciocompra" name="preciocompra" value="@if(isset($data->producto)){{$data->producto->pre6}}@endif" placeholder="precio compra">
                                                            <label for="preciocompra">precio compra</label>

                                                        </div>
                                                    </div>


                                                </span>

                                                <span class="flex-direction: row" style="padding-left: 0.375rem">


                                                    <div class="form-group col-lg-4">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="precio" name="precio" value="@if(isset($data->producto)){{$data->producto->pre1}}@endif" placeholder="precio">
                                                            <label for="precio">precio</label>

                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group col-lg-4">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="precio2" name="precio2" value="" placeholder="precio2">
                                                            <label for="precio2">precio 2</label>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-4">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="precio3" name="precio3" value="" placeholder="precio3">
                                                            <label for="precio3">precio 3</label>

                                                        </div>
                                                    </div> -->


                                                </span>





                                                <div>

                                                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                                                </div>
                                            </form>
                                    </div>
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
        $('.js-example-basic-multiple').select2();
        $('.js-example-basic-multiple').attr("disabled", true);
       
    });
    $('.form-check-input').change(function() {
        if(this.checked) {
          
            $('.js-example-basic-multiple').attr("disabled", false);
        }else{
            
            $('.js-example-basic-multiple').attr("disabled", true);
        }
       
    });
    $(document).on('keyup', '.preciocompra', function() {
        // Does some stuff and logs the event to the console

        preciocompra = $(this).val()

        $("#precio").val((preciocompra * 1.30).toFixed(2));
        $("#precio2").val((preciocompra * 1.25).toFixed(2));
        $("#precio3").val((preciocompra * 1.15).toFixed(2));


        //   alert($(this).val());
    });
</script>

@stop