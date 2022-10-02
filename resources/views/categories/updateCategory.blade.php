<!-- modal -->
<div class="modal fade" id="updateCategory-{{$categorias->id}}" tabindex="-1" role="dialog" aria-labelledby="updateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Categoría {{$categorias->model}}</h4>
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
                <form action="{{ url('/categories/update',$categorias->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" class="form-control" name="model" id="model" value="{{$categorias->model, old('model')}}" required >
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Categoria</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$categorias->descripcion, old('descripcion')}}">
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