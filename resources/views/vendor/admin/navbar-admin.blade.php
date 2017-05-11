<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin') }}">SIGGIEH</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Estado Usuario</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <img class="img-responsive img-thumbnail" src="{{ asset('img/logo.png') }}" alt="">
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="{{ route('admin') }}"><i class="fa fa-dashboard fa-fw"></i> Escritorio</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-credit-card fa-fw"></i> Gestionar Ventas<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('cliente.create') }}">Registrar Clientes</a>
                        </li>
                        <li>
                            <a href="{{ route('disponibilidad') }}">Consultar Disponibilidad</a>
                        </li>
                        <li>
                            <a href="{{ route('presupuesto.index') }}">Gestionar Presupuesto</a>
                        </li>
                        <li>
                            <a href="#">Aplicar Abono <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Gestionar Indicador</a>
                                </li>
                                <li>
                                    <a href="#">Cargar Factura</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar-check-o fa-fw"></i> Coordinar Eventos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('productService.index') }}">Registrar Productos y Servicios</a>
                        </li>
                        <li>
                            <a href="#">Generar Ordenes Servicios</a>
                        </li>
                        <li>
                            <a href="{{ route('cronograma') }}">Generar Cronograma</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog fa-fw"></i> Administrar Sistema<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('user.index') }}">Crear Usuario</a>
                        </li>
                        <li>
                            <a href="#">Estado de Usuario</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
