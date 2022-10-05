@extends('layouts.panel')

@section('title','Dashboard')

@section('content')

<div class="row mt-12">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Vehiculos') }}</div>
            <div class="card-body">
                <!-- Notifications -->
                <div class="card-body">
                    @if(session('notificacion'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notificacion')}}
                    </div>
                    <div class="alert alert-success" role="alert">
                        <div>
                            <h5 style="text-align: center;">Detalle de la Renta</h5>
                            <hr>
                        </div>
                        <h5>N° de Boleta B000{{$viewrentado->id}}-01</h5>
                        <h4>N° Placa del Vehiculo: {{$viewrentado->vehicles->placa}}</h4>
                        <h4>Nombres: {{$viewrentado->usuarios->name}} DNI: {{$viewrentado->usuarios->dni}}</h4>
                        <h4>Direccion: {{$viewrentado->usuarios->direccion}} Telefono: {{$viewrentado->usuarios->telefono}}</h4>
                        <h4>Fecha Inicio de Renta: {{$viewrentado->a_inicio}}</h4>
                        <h4>Fecha Final de Renta: {{$viewrentado->a_fin}}</h4>
                        <h4>Estado actual del Pedido: @if ($viewrentado->status == 1) <span class="badge badge-pill badge-default">Procesando...</span> @else <span class="badge badge-pill badge-danger">Ejecutado</span> @endif</h4>
                        <h4>Precio Total a Pagar: S/. {{$viewrentado->a_precio}}</h4>
                        <h4>Fecha: {{$viewrentado->updated_at}}</h4>
                        <span>Nota: Debe tomar esta imagen como constancia de su pedido y acérquese a nuestro local.</span>
                    </div>
                    @endif
                </div>
                <!-- nav -->
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-economicos-tab" data-toggle="tab" href="#tabs-icons-economicos" role="tab" aria-controls="tabs-icons-economicos" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Económico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-standard-tab" data-toggle="tab" href="#tabs-icons-standard" role="tab" aria-controls="tabs-icons-standard" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Standard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-premium-tab" data-toggle="tab" href="#tabs-icons-premium" role="tab" aria-controls="tabs-icons-premium" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Premium</a>
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
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                            <div class="card-body">
                                                <h5 style="text-transform: uppercase; text-align: center;">{{$vehiculo->nombre}}</h5>
                                                <h5>Categoría:<span class="badge badge-lg badge-info">{{$vehiculo->categories->model}}</span></h5>
                                                <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                                <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                                <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                                <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                                <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                                <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                                <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                                <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#usernewRent-{{$vehiculo->id}}">Reservar Ahora</button></center>
                                            </div>
                                        </div>
                                    </div>
                                    @include('usernewRent')
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- inicio de standard -->
                            <div class="tab-pane fade" id="tabs-icons-standard" role="tabpanel" aria-labelledby="tabs-icons-standard-tab">
                                <div class="row">
                                    <!-- card 1 -->
                                    @foreach ($v_vehiculos as $vehiculo)
                                    @if ($vehiculo->clasifica == 2 && $vehiculo->status == 1)
                                    <div class="col-sm-4">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                            <div class="card-body">
                                                <h5 style="text-transform: uppercase; text-align: center;">{{$vehiculo->nombre}}</h5>
                                                <h5>Categoría:<span class="badge badge-lg badge-info">{{$vehiculo->categories->model}}</span></h5>
                                                <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                                <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                                <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                                <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                                <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                                <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                                <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                                <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#usernewRent-{{$vehiculo->id}}">Reservar Ahora</button></center>
                                            </div>
                                        </div>
                                    </div>
                                    @include('usernewRent')
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
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{$vehiculo->foto_r}}" alt="img-vehiculo-{{$vehiculo->id}}">
                                            <div class="card-body">
                                                <h5 style="text-transform: uppercase; text-align: center;">{{$vehiculo->nombre}}</h5>
                                                <h5>Categoría:<span class="badge badge-lg badge-info">{{$vehiculo->categories->model}}</span></h5>
                                                <h5><i class="ni ni-calendar-grid-58"></i> Año de Fabricación: {{$vehiculo->anio}} - {{$vehiculo->marca}}</h5>
                                                <h5><i class="ni ni-bus-front-12"></i> N° Asientos: {{$vehiculo->nro_asientos}}</h5>
                                                <h5><i class="ni ni-delivery-fast"></i> Tipo: @if ($vehiculo->clasifica == 1) Económico @elseif ($vehiculo->clasifica == 2) Standart @else Premium @endif</h5>
                                                <h5><i class="ni ni-user-run"></i> Kilometros Recorridos: {{$vehiculo->recorrido}} km.</h5>
                                                <h5><i class="ni ni-atom"></i> Aire Acondicionado: {{$vehiculo->aire_acondicionado}}</h5>
                                                <h5><i class="ni ni-settings"></i> Auto: {{$vehiculo->tipo}}</h5>
                                                <h5><i class="ni ni-money-coins"></i> Precio: s/. {{$vehiculo->precio_d}} (x días)</h5>
                                                <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#usernewRent-{{$vehiculo->id}}">Reservar Ahora</button></center>
                                            </div>
                                        </div>
                                    </div>
                                    @include('usernewRent')
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection