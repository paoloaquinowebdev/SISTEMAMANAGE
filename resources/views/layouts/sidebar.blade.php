<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{URL::to('/home') }}" class="brand-link">
    <img alt="Laravel Starter" class="brand-image img-circle elevation-3" style="opacity: .8" src="{{asset("/img/logo.png")}}">
    <span class="brand-text font-weight-light">System Manage</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img class="img-circle elevation-2" alt="User Image" src="{{asset("/img/profile.png")}}">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name!=null ? auth()->user()->name : "Administrator"}} </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- <li class="nav-item has-treeview {!! classActivePath(1,'dashboard') !!}">
          <a href="" class="nav-link {!! classActiveSegment(1, 'dashboard') !!}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard123
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link {!! classActiveSegment(2, 'home') !!}">
                <i class="fas fa-circle"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('v2') }}" class="nav-link {!! classActiveSegment(2, 'v2') !!}">
                <i class="fas fa-circle"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('v3') }}" class="nav-link {!! classActiveSegment(2, 'v3') !!}">
                <i class="fas fa-circle"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> -->
        @if(auth()->user()->id == 4)
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Inventario
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('/productos') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/productos/newproducto')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Registrar Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/productos/inventario/pdf')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Inventario Reporte </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/productos/gastos')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Gastos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('ventas/showCompras')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Compras</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tree"></i>
            <p>
              Categorias
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('/categoria') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Categoria</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{URL::to('/categoria/tipogasto') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Tipo Gastos</p>
              </a>
            </li> 
            <!-- <li class="nav-item">
              <a href="pages/UI/buttons.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Buttons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/sliders.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
              Clientes
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('/cliente')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Clientes</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/editors.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Editors</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-table"></i>
            <p>
              Ventas
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('ventas/dashventasticket')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('ventas/ventasticket')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ventas Ticket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('ventas')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Facturacion Electronica</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Ventas</p>
              </a>
            </li> -->
           
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Empresa
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('empresa')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Empresa</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Data Tables</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuarios
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('usuario')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('usuario/perfil')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Perfiles</p>
              </a>
            </li>
          </ul>
        </li>
        @else


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-table"></i>
            <p>
              Ventas
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{URL::to('ventas/dashventasticket')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('ventas/ventasticket')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Ventas Ticket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('ventas')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Facturacion Electronica</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Consultar Ventas</p>
              </a>
            </li> -->
           
          </ul>
        </li>
        @endif
       
        <!-- <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-envelope-open"></i>
            <p>
              Mailbox
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/mailbox/mailbox.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Inbox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/compose.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Compose</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Read</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Pages
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/examples/invoice.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/profile.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/login.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/register.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Register</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/lockscreen.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Lockscreen</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-plus-square"></i>
            <p>
              Extras
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/examples/404.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Error 404</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/500.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Error 500</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/blank.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Blank Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="starter.html" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Starter Page</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">MISCELLANEOUS</li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs" class="nav-link">
            <i class="nav-icon fa fa-file"></i>
            <p>Documentation</p>
          </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fas fa-circle-notch text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fas fa-circle-notch text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fas fa-circle-notch text-info"></i>
            <p>Informational</p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>