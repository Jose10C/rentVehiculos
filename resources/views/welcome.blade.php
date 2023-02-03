@extends('layouts.form')

@section('title','Vehículos en Renta')

@section('content')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-10">
            <div class="card shadow card-primary">
                <div class="card-body">
                    <h3 style="text-align: center;">Aquí encontrarás las mejores vehículos a tu gusto</h3>
                    <span style="text-align: center;">Aquí encontrarás los dirvesos vehiculos para alquilar y disfrutar para lo que necesites en un solo click. Todos estos disponibles para todo el Perú, haga su pedido con total seguridad y confianza.</span>
                </div>
            </div>
            <!-- carrusel incio -->
            <br>
            <div class="card shadow">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{asset('img/theme/profile-cover.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('img/theme/team-1-800x800.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{asset('img/theme/team-3-800x800.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- carrusel fin -->
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-economicos-tab" data-toggle="tab" href="#tabs-icons-economicos" role="tab" aria-controls="tabs-icons-economicos" aria-selected="true"><!-- <i class="ni ni-cloud-upload-96 mr-2"></i> -->Económico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-standard-tab" data-toggle="tab" href="#tabs-icons-standard" role="tab" aria-controls="tabs-icons-standard" aria-selected="false"><!-- <i class="ni ni-bell-55 mr-2"></i> -->Estandar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-premium-tab" data-toggle="tab" href="#tabs-icons-premium" role="tab" aria-controls="tabs-icons-premium" aria-selected="false"><!-- <i class="ni ni-calendar-grid-58 mr-2"></i> -->Premium</a>
                    </li>
                </ul>
            </div>
            <!-- content nav -->
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <!-- inicio de economico -->
                        <div class="tab-pane fade show active" id="tabs-icons-economicos" role="tabpanel" aria-labelledby="tabs-icons-economicos-tab">
                            <div class="row">
                                <!-- card 1 -->
                                @foreach ($v_vehiculos as $vehiculo)
                                @if ($vehiculo->clasifica == 1 && $vehiculo->status == 1)
                                <div class="col-sm-4">
                                    <div class="card" style="width: 18rem; background-color: #2dce891f;">
                                        <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <span class="badge badge-pill badge-danger text-white text-h1">{{$vehiculo->nombre}}</span>
                                            </div>
                                            <!-- <h5 style="text-transform: uppercase; text-align: center;">{{$vehiculo->nombre}}</h5> -->
                                            <div class="text-default text-center">
                                                <h2>Oferta!! s/. {{$vehiculo->precio_d}}.00</h2>
                                            </div>
                                            <!-- <h5>Categoría:<span class="badge badge-lg badge-info text-default">{{$vehiculo->categories->model}}</span></h5> -->
                                            <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                            <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                            <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                            <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                            <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                            <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                            <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                            <center><button type="button" class="btn btn-default" data-toggle="modal" data-target="#newrent-modal">Reservar Ahora</button></center>
                                            <!-- <a href="{{ url('login')}}"class="btn btn-success">Reservar Ahora</a> -->
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- inicio de standard -->
                        <div class="tab-pane fade" id="tabs-icons-standard" role="tabpanel" aria-labelledby="tabs-icons-standard-tab">
                            <div class="row">
                                <!-- card 1 -->
                                @foreach ($v_vehiculos as $vehiculo )
                                @if ($vehiculo->clasifica == 2 && $vehiculo->status == 1)
                                <div class="col-sm-4">
                                    <div class="card" style="width: 18rem; background-color: #2dce891f;">
                                        <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <span class="badge badge-pill badge-danger text-white text-h1">{{$vehiculo->nombre}}</span>
                                            </div>
                                            <div class="text-default text-center">
                                                <h2>Oferta!! s/. {{$vehiculo->precio_d}}.00</h2>
                                            </div>
                                            <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                            <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                            <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                            <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                            <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                            <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                            <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                            <!-- <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newRent">Reservar Ahora</button></center> -->
                                            <center><button type="button" class="btn btn-default" data-toggle="modal" data-target="#newrent-modal">Reservar Ahora</button></center>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- inicio de premium -->
                        <div class="tab-pane fade" id="tabs-icons-premium" role="tabpanel" aria-labelledby="tabs-icons-premium-tab">
                            <div class="row">
                                <!-- card 1 -->
                                @foreach ($v_vehiculos as $vehiculo)
                                @if ($vehiculo->clasifica == 3 && $vehiculo->status == 1)
                                <div class="col-sm-4">
                                    <div class="card" style="width: 18rem; background-color: #2dce891f;">
                                        <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <span class="badge badge-pill badge-danger text-white text-h1">{{$vehiculo->nombre}}</span>
                                            </div>
                                            <div class="text-default text-center">
                                                <h2>Oferta!! s/. {{$vehiculo->precio_d}}.00</h2>
                                            </div>
                                            <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                            <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                            <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                            <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                            <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                            <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                            <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                            <!-- <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#newRen">Reservar Ahora</button></center> -->
                                            <center><button type="button" class="btn btn-default" data-toggle="modal" data-target="#newrent-modal">Reservar Ahora</button></center>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin -->

            <div class="progress-wrapper">
                <div class="progress-info">
                    <div class="progress-label">
                        <span>Progreso</span>
                    </div>
                    <div class="progress-percentage">
                        <span>40%</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- inicio modal login -->
<div class="modal fade" id="newrent-modal" tabindex="-1" role="dialog" aria-labelledby="newrent-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inicio de Sesión</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    @if ($errors->any())
                                    <div class="text-center text-muted mb-2">
                                        <h4>Se encontró el siguiente error.</h4>
                                    </div>
                                    <div class="alert alert-danger mb-4" role="alert">
                                        {{ $errors->first() }}
                                    </div>
                                    @else
                                    <div class="text-center text-muted mb-4">
                                        <small>Ingrese sus Credinciales</small>
                                    </div>
                                    @endif
                                    <form role="form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Correo Electrónico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="remember" id=" remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for=" remember">
                                                <span class="text-muted">Recordarme</span>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary my-4">Iniciar Sessión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <a href="{{ route('password.request') }}" class="text-light"><small>¿Olvidaste tu Contraseña?</small></a>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('register') }}" class="text-light"><small>Crear una Cuenta</small></a>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection