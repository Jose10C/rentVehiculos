@extends('layouts.panel')

@section('title','Dashboard')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Clientes</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newCategory">
                    <i class="fas fa-plus"></i> Nueva Cliente
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">N° DNI</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $cliente as $clientes)
                <tr>
                    <th scope="row">{{$clientes->id}}</th>
                    <td>{{$clientes->name}}</td>
                    <td>{{$clientes->email}}</td>
                    <td>{{$clientes->dni}}</td>
                    <td>{{$clientes->telefono}}</td>
                    <td>{{$clientes->direccion}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateCategory">Editar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection