@extends('layouts.panel')

@section('title','Alquiler')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Alquiler</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newRent">
                    <i class="fas fa-plus"></i> Nuevo Alquiler
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
                    <th scope="col">N° Placa</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">F. Inicial</th>
                    <th scope="col">F. Fin</th>
                    <th scope="col">Situacion</th>
                    <th scope="col">F. Renta</th>
                    <th scope="col">Precio s/.</th>
                    <th scope="col">Razón</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $alquiler as $alquilado)
                <tr>
                    <th scope="row">{{$alquilado->id}}</th>
                    <td>{{$alquilado->vehicles->placa}}</td>
                    <td>{{$alquilado->usuarios->name}}</td>
                    <td>{{$alquilado->a_inicio}}</td>
                    <td>{{$alquilado->a_fin}}</td>
                    <td>@if ($alquilado->status == 1) <span class="badge badge-pill badge-success">Disponible</span> @else <span class="badge badge-pill badge-danger">Ocupado</span> @endif</td>
                    <td>{{$alquilado->a_precio}}</td>
                    <td>{{$alquilado->updated_at}}</td>
                    <td>Para uso particular</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateRent-{{$alquilado->id}}">Editar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">Eliminar</button>
                    </td>
                </tr>
                @include('rents.updateRent')
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="newRent" tabindex="-1" role="dialog" aria-labelledby="newRentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Alquiler</h4>
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
                <form action="{{ url('/rents/new')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="clients_id">N° DNI</label>
                        <input type="number" class="form-control" name="clients_id" id="clients_id" value="{{ old('clients_id')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="vehicles_id">N° Placa</label>
                        <input type="number" class="form-control" name="vehicles_id" id="vehicles_id" value="{{ old('vehicles_id')}}">
                    </div>

                    <div class="form-group">
                        <label for="users_id">N° Usuario</label>
                        <input type="number" class="form-control" name="users_id" id="users_id" value="{{ old('users_id')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_inicio">Fecha Inicial</label>
                        <input type="date" class="form-control" name="a_inicio" id="a_inicio" value="{{ old('a_inicio')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_fin">Fecha Final</label>
                        <input type="date" class="form-control" name="a_fin" id="a_fin" value="{{ old('a_fin')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_precio">Precio</label>
                        <input type="number" class="form-control" name="a_precio" id="a_precio" value="{{ old('a_precio')}}">
                    </div>

                    <div class="form-group">
                        <label for="status">Situación</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">Disponible</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">Ocupado (5 dias restantes)</label>
                        </div>
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
                <div class="py-4 text-center">
                    <i class="ni ni-notification-70 ni-5x"></i>
                    <h4 class="heading mt-4">¿Está seguro que quiere eliminar este alquiler {{$alquilado->id}}?</h4>
                    <p>*Adevertencia: Una vez eliminado el registro no se podrá recuperar.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ url('/rents/delete', $alquilado->id)}}" method="post">
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