@extends('layouts.panel')

@section('title','Dashboard')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Categorias</h3>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newCategory">
                    <i class="fas fa-plus"></i> Nueva Categoria
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
                    <th scope="col">Descripción</th>
                    <th scope="col">Última Actualización</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $categoria as $categorias)
                <tr>
                    <th scope="row">{{$categorias->id}}</th>
                    <td>{{$categorias->model}}</td>
                    <td>{{$categorias->descripcion}}</td>
                    <td>{{$categorias->updated_at}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateCategory-{{$categorias->id}}">Editar</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-notification">Eliminar</button>
                    </td>
                </tr>
                @include('categories.updateCategory')
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="newCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
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
                <form action="{{ url('/categories/new')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="model">Categoria</label>
                        <input type="text" class="form-control" name="model" id="model" value="{{ old('model')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion')}}">
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
                    <h4 class="heading mt-4">¿Está seguro que quiere eliminar esta categoría {{$categorias->model}}?</h4>
                    <p>*Adevertencia: Una vez eliminado el registro no se podrá recuperar.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ url('/categories/delete', $categorias->id)}}" method="post">
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