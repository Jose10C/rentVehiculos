<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestion</h6>

<ul class="navbar-nav">
    <li class="nav-item  active ">
        <a class="nav-link  active " href="{{ route('home')}}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
        </a>
    </li>
    @if (auth()->user()->id==1 || auth()->user()->id==2 || auth()->user()->id==3 || auth()->user()->id==4 || auth()->user()->id==5 || auth()->user()->id==6)
    
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/categories')}}">
            <i class="ni ni-planet text-blue"></i> Cateogorias
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/vehicles')}}">
            <i class="ni ni-pin-3 text-orange"></i> Vehículos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/clients')}}"> 
            <i class="ni ni-single-02 text-yellow"></i> Clientes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/rents')}}">
            <i class="ni ni-bullet-list-67 text-red"></i> Alquileres
        </a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link " href="{{ url('/pedidos')}}">
            <i class="ni ni-bullet-list-67 text-red"></i> Mis Pedidos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-sing-in-alt"></i> Cerrar Sessióm
        </a>
        <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Ver</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="ni ni-spaceship"></i> Ver Tienda
        </a>
    </li>
</ul>
