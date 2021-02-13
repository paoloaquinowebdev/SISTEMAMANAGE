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

  
    <div class="row">

      <div class="col-sm-12">
        <table class="table-bordered P-2" style="width: 100%; border:0px; border-radius: 1em;">
          <thead class="carranza text-white">
            <tr>
              <th class="text-center p-1">Codigo </th>
              <th class="text-center p-1">Producto </th>
              <th class="text-center p-1">Unidades</th>
              <th class="text-center p-1">Stock</th>
              <th class="text-center p-1">Precio</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($data))
            @php $cont = 0; @endphp
            @foreach($data as $producto)
            <tr>
            <td class=" p-1 pl-2" style="width: 60%;">{{$producto->nropro}}</td>
              <td class=" p-1 pl-2" style="width: 60%;">{{$producto->despro}}</td>
              <td class="text-center p-1" style="width: 15%;">{{$producto->unidadmedida}}</td>
              <td class="text-center p-1 " style="width: 10%;">{{$producto->stock}}</td>
              <td class="text-center p-1" style="width: 15%;">{{$producto->pre1}}</td>
          
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


        </table>
      </div>
    </div>
  
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->
    
</body>
</html>