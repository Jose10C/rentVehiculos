@extends('layouts.panel')

@section('title','Vehiculos')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Vehículos</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newVehicle">
                    <i class="fas fa-plus"></i> Nueva Vehiculo
                </button>
            </div>
        </div>
    </div>
    <!-- Notifications -->
    <div class="card-body">
        @if(session('notificacion'))
        <div class="alert alert-success" role="alert">
            {{ session('notificacion')}}
        </div>
        @endif
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">N° Placa</th>
                    <th scope="col">Marca</th>
                    <th scope="col">N° Asientos</th>
                    <th scope="col">Año</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Kilometraje</th>
                    <th scope="col">Aire/A</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $vehiculo as $vehiculos)
                <tr>
                    <th scope="row">{{$vehiculos->id}}</th>
                    <td>{{$vehiculos->category_id}}</td>
                    <td>{{$vehiculos->placa}}</td>
                    <td>{{$vehiculos->marca}}</td>
                    <td>{{$vehiculos->nro_asientos}}</td>
                    <td>{{$vehiculos->anio}}</td>
                    <td>{{$vehiculos->tipo}}</td>
                    <td>{{$vehiculos->recorrido}}</td>
                    <td>{{$vehiculos->aire_acondicionado}}</td>
                    <td>{{$vehiculos->status}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateVehicle-{{$vehiculos->id}}">Editar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">Eliminar</button>
                    </td>
                </tr>
                @include('vehicles.updateVehicle')
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="newVehicle" tabindex="-1" role="dialog" aria-labelledby="newVehicleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Vehículo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Por Favor!</strong> {{ $error }}!
                </div>
                @endforeach
                @endif
                <form action="{{ url('/vehicles/new')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="placa">N° Placa</label>
                        <input type="text" class="form-control" name="placa" id="placa" value="{{ old('placa')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" name="marca" id="marca" value="{{ old('marca')}}">
                    </div>

                    <div class="form-group">
                        <label for="nro_asientos">N° de Asientos</label>
                        <input type="number" class="form-control" name="nro_asientos" id="nro_asientos" value="{{ old('nro_asientos')}}">
                    </div>

                    <div class="form-group">
                        <label for="anio">Año del Fabricación</label>
                        <input type="number" class="form-control" name="anio" id="anio" value="{{ old('anio')}}">
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" value="{{ old('tipo')}}">
                    </div>

                    <div class="form-group">
                        <label for="recorrido">Kilometraje Recorrido (km)</label>
                        <input type="number" class="form-control" name="recorrido" id="recorrido" value="{{ old('recorrido')}}">
                    </div>

                    <div class="form-group">
                        <label for="aire_acondicionado">Aire Acondicionado</label>
                        <input type="text" class="form-control" name="aire_acondicionado" id="aire_acondicionado" value="{{ old('aire_acondicionado')}}">
                    </div>

                    <div class="form-group">
                        <label for="status">Disponibilidad</label>
                        <input type="text" class="form-control" name="status" id="status" value="{{ old('status')}}">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoria de Vehículo</label>
                        <input type="number" class="form-control" name="category_id" id="category_id" value="{{ old('category_id')}}">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal notification -->
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">ELIMINAR</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">¿Está seguro que quiere eliminar este Vehículo {{$vehiculos->placa}}?</h4>
                    <p>*Adevertencia: Una vez eliminado el registro no se podrá recuperar.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ url('/vehicles/delete', $vehiculos->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-white">Si, Confirmar</button>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">No, Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection