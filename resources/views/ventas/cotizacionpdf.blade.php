<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style>
    body {
      /* font-family: 'Times New Roman', Times, serif; */
      /* font-family: 'verdana'; */
      /* font-family: "Lucida Console", Courier, monospace; */
      font-family: Arial, Helvetica, sans-serif;
    }

    .page-break {
      page-break-after: always;
    }

    .carranza {
      background-color: #f38425;
    }

    .sinformat {
      background-color: white;
      color: black;

    }

    .logo {
      background-color: white;
      height: 75px;
      width: 150px;
    }

    .tablapdf {

      border-spacing: 0;
      border: 1px solid black;
    }

    body {
      font-size: 12px;
    }

    .rcorners2 {
      border-radius: 25px;
      border: 1px solid #f38425;
      margin: 10px;
      padding: 10px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">

    <div class="row mt-5">
      <div class="col-sm-12">
        <table class="" style="width: 100%; border:0px;">

          <tbody>
            <tr>
              <td class="sinformat" colspan="3" style="width: 30%;">
                <img src="{{ base_path() .'/storage/app/public/img/logo2.jpg' }}" class="logo" alt="">
              </td>
              <td class="sinformat text-center" style="width: 40%;">
                <h4>
                  {{$data->empresa->nomemp}} <br>
                </h4>
                <span class="text-lowercase">
                  {{$data->empresa->diremp}}<br>
                </span>
                RUC : {{$data->empresa->ruc}}<br>
                {{$data->empresa->mailemp}}<br>
                Telef. {{$data->empresa->telef1}}


              </td>
              <td class="  sinformat " style="width: 30%; padding-left: 20px;">
                <p></p>
                <table class=" P-2 rcorners2">
                  <tr>
                    <td colspan="2" class="p-2 " style=" border: 1px solid #f38425;">
                      <h6>Cotización N° - 0001 </h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="p-2 ">
                      Fecha:
                    </td>
                    <td class="p-2 ">{{$data->fecha}}</td>
                  </tr>
                  <tr>
                    <td class="p-2 ">
                      Válido hasta:
                    </td>
                    <td class="p-2 ">
                      {{$data->fecha}}
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </tbody>


        </table>
      </div>
    </div>

    <p></p>
    <p></p>
    <p></p>
    <p></p>

    <div class="row mt-5">
      <div class="col-sm-9">
        <table class="">
          <thead class="">
            <tr>
              <th colspan="2" class="text-left">Estimado:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 60px;">
              <td class="text-left">
                <h6>{{$data->razon_social}}</h6>
              </td>
            </tr>
            <tr>
              <td style="width: 60px;"><strong> RUC:</strong></td>
              <td class="text-left p-1 "> {{$data->ruc}}</td>
            </tr>
            <tr>
              <td style="width: 60px;"><strong>Dirección: </strong></td>
              <td class="text-left p-1"> {{$data->direccion}}</td>
            </tr>
            <tr>
              <td class="text-left p-1"><strong>Telefono</strong> </td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>



    <div class="row">

      <div class="col-sm-12">
        <table class="table-bordered P-2" style="width: 100%; border:0px; border-radius: 1em;">
          <thead class="carranza text-white">
            <tr>
              <th class="text-center p-1">Descripcion de Item</th>
              <th class="text-center p-1">Cantidad </th>
              <th class="text-center p-1">Precio Unitario</th>
              <th class="text-center p-1">Importe</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($data->descripcion))
            @php $cont = 0; @endphp
            @foreach($data->descripcion as $descripcion)
            <tr>
              <td class=" p-1 pl-2" style="width: 60%;">{{$descripcion}}</td>
              <td class="text-center p-1 " style="width: 10%;">{{$data->cantidad[$cont]}}</td>
              <td class="text-center p-1" style="width: 15%;">{{$data->precio[$cont]}}</td>
              <td class="text-center p-1" style="width: 15%;">{{$data->importe[$cont]}}</td>

            </tr>
            @php $cont ++; @endphp
            @endforeach
            @endif
            <tr>
              <td colspan="4"></td>
            </tr>
            <tr>
              <td colspan="4"></td>
            </tr>
          </tbody>

          <tfoot>

            <tr>
              <td colspan="2" style=" border: inset 0pt"></td>
              <td class="text-center"><strong>Subtotal</strong></td>
              <td class="text-center"><strong>{{ round($data->total / 1.18,2)}}</strong></td>
            </tr>
            <tr>
              <td colspan="2" style=" border: inset 0pt"></td>
              <td class="text-center"><strong>IGV</strong></td>
              <td class="text-center"><strong>{{ round(($data->total / 1.18)*0.18,2)}}</strong></td>
            </tr>
            <tr>
              <td colspan="2" style=" border: inset 0pt"></td>
              <td class="text-center"><strong>Tota</strong>l</td>
              <td class="text-center p-1"><strong>{{$data->total}}</strong></td>
            </tr>

          </tfoot>
        </table>
      </div>
    </div>
    <p></p>
    <br>
    <br>
    <br>
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->
    <div class="row mt-5 ">
      <div class="col-sm-12">
        <p class="text-justify">Si desea discutir alguno de los elementos de este presupuesto o si necesita alguna otra información, no dude en llamarnos personalmente al número {{$data->empresa->telef1}} .</p>
      </div>
    </div>
</body>
</html>