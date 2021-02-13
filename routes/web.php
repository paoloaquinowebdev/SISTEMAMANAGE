<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
Route::get('register', 'Auth\LoginController@login')->name('register');
Route::post('register', 'Auth\LoginController@login');


Route::prefix('usuario')->group(function () {

  Route::get('/', function () {
    return  App::call('App\Http\Controllers\Auth\UsuarioController@showDashUsuarios');
    })->middleware('auth');
  
  Route::get('/registrar', 'Auth\UsuarioController@showRegistrationForm');

  Route::post('/add', function () {
		return  App::call('App\Http\Controllers\Auth\RegisterController@registraruser');
    })->middleware('auth');

  Route::get('/perfil', function () {
    return  App::call('App\Http\Controllers\Auth\UsuarioController@showDashPerfil');
    })->middleware('auth');

  Route::match(['get', 'post'],'/perfil/add/','Auth\UsuarioController@registrarPerfil')
    ->middleware('auth');

  Route::match(['get', 'post'],'/perfil/users/{id}','Auth\UsuarioController@showDashUserPerfil')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/perfil/adduser/{id}','Auth\UsuarioController@registrarUsuarioPerfil')
  ->where('id' , '[0-9]+')->middleware('auth');
  
  // Route::post('/add', function () {
  //   return  App::call('App\Http\Controllers\Auth\UsuarioController@registrarProducto');
  // })->middleware('auth');


  // Route::match(['get', 'post'],'/edit/{id}','Auth\UsuarioController@editProducto')
  // ->middleware('auth');

});

Route::get('/home', 'DashboardController@bienvenido')->name('home')->middleware('auth');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');


 Route::prefix('productos')->group(function () {

    Route::get('/', function () {
		return  App::call('App\Http\Controllers\Productos\ProductosController@showDashProductos');
    })->middleware('auth');
    
    Route::get('/newproducto', function () {
		return App::call('App\Http\Controllers\Productos\ProductosController@showNewProductos');
    })->middleware('auth');
    
    Route::post('/add', function () {
      return  App::call('App\Http\Controllers\Productos\ProductosController@registrarProducto');
    })->middleware('auth');

    Route::match(['get', 'post'],'/edit/{id}','Productos\ProductosController@editProducto')
    ->middleware('auth');

    Route::match(['get', 'post'],'/obtenerproducto','Productos\ProductosController@obtenerproductos')
    ->middleware('auth');

    Route::match(['get', 'post'],'/filtrarproducto','Productos\ProductosController@filtrarproducto')
    ->middleware('auth');

    Route::match(['get', 'post'],'/delete','Productos\ProductosController@deleteProducto')
    ->middleware('auth');

    Route::match(['get', 'post'],'/inventario/pdf','Productos\ProductosController@ExportarInventario')
    ->where('id' , '[0-9]+')->middleware('auth');

    Route::get('/gastos', function () {
      return App::call('App\Http\Controllers\Productos\ProductosController@showGastos');
      })->middleware('auth');
    
    Route::match(['get', 'post'],'/gastos/add','Productos\ProductosController@RegistrarGastos')
    ->where('id' , '[0-9]+')->middleware('auth');
      

 });

 Route::prefix('categoria')->group(function () {

  Route::get('/', function () {
  return  App::call('App\Http\Controllers\Categoria\CategoriaController@showCategoria');
  })->middleware('auth');
  
  Route::post('/add', function () {
  return App::call('App\Http\Controllers\Categoria\CategoriaController@registrarCategoria');
  })->middleware('auth');

  Route::match(['get', 'post'],'/edit/{id}','Categoria\CategoriaController@editarCategoria')
  ->where('id' , '[0-9]+')->middleware('auth');
  

  Route::get('/tipogasto', function () {
    return  App::call('App\Http\Controllers\Categoria\CategoriaController@showTipoGastos');
    })->middleware('auth');

  Route::match(['get', 'post'],'/tipogasto/registrar','Categoria\CategoriaController@registrarTipoGasto')
    ->where('id' , '[0-9]+')->middleware('auth');  
  

});

Route::prefix('cliente')->group(function () {

  Route::match(['get', 'post'],'/','Cliente\ClienteController@showCliente')
  ->where('id' , '[0-9]+')->middleware('auth');
  
  Route::match(['get', 'post'],'/clienteruc','Cliente\ClienteController@showClienteRuc')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/registrar','Cliente\ClienteController@registrarCliente')
  ->where('id' , '[0-9]+')->middleware('auth');

});

Route::prefix('ventas')->group(function () {

  Route::match(['get', 'post'],'/','Ventas\VentasController@showVentas')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/cotizacion','Ventas\VentasController@showCotizacion')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/clienteruc','Ventas\VentasController@showCliente')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/cotizacion/pdf','Ventas\VentasController@generarCotizacionPdf')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/guardarventa','Ventas\VentasController@guardarventa')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/descargar','Ventas\VentasController@descargarcab')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/compras','Ventas\VentasController@compras')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/showCompras','Ventas\VentasController@showCompras')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/dashventas','Ventas\VentasController@dashventas')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/dashventasticket','Ventas\VentasController@dashventasticket')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/ventasticket','Ventas\VentasController@showVentasTicket')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/imprimirticket','Ventas\VentasController@imprimirticket')
  ->where('id' , '[0-9]+')->middleware('auth');
  
  Route::match(['get', 'post'],'/anular/{id}','Ventas\VentasController@anularVenta')
  ->middleware('auth');
 
});

Route::prefix('empresa')->group(function () {

  Route::match(['get', 'post'],'/','Empresa\EmpresaController@showDash')
  ->where('id' , '[0-9]+')->middleware('auth');

  Route::match(['get', 'post'],'/addempresa','Empresa\EmpresaController@RegistrarEmpresa')
  ->where('id' , '[0-9]+')->middleware('auth');

});





