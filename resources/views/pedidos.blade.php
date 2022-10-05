@extends('layouts.panel')

@section('title','Mis Rentas')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Ver Mis Rentas</h3>
            </div>

        </div>
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
                    <th scope="col">Estado Actual</th>
                    <th scope="col">Precio s/.</th>
                    <th scope="col">F. Renta</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $ver as $alquilado)
                <tr>
                    <th scope="row">{{$alquilado->id}}</th>
                    <td>{{$alquilado->vehicles->placa}}</td>
                    <td>{{$alquilado->usuarios->name}}</td>
                    <td>{{$alquilado->a_inicio}}</td>
                    <td>{{$alquilado->a_fin}}</td>
                    <td>@if ($alquilado->status == 1) <span class="badge badge-pill badge-success">En Ejecución</span> @else <span class="badge badge-pill badge-danger">Ejecutado</span> @endif</td>
                    <td>{{$alquilado->a_precio}}</td>
                    <td>{{$alquilado->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection