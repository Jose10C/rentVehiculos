<!-- modal -->
<div class="modal fade" id="updateVehicle-{{$vehiculos->id}}" tabindex="-1" role="dialog" aria-labelledby="updateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Categoría {{$vehiculos->placa}}</h4>
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
                <form action="{{ url('/vehicles/update',$vehiculos->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$vehiculos->nombre, old('nombre')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="placa">N° Placa</label>
                        <input type="text" class="form-control" name="placa" id="placa" value="{{$vehiculos->placa, old('placa')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" name="marca" id="marca" value="{{$vehiculos->marca, old('marca')}}">
                    </div>

                    <div class="form-group">
                        <label for="nro_asientos">N° de Asientos</label>
                        <input type="number" class="form-control" name="nro_asientos" id="nro_asientos" value="{{$vehiculos->nro_asientos, old('nro_asientos')}}">
                    </div>

                    <div class="form-group">
                        <label for="anio">Año del Fabricación</label>
                        <input type="number" class="form-control" name="anio" id="anio" value="{{$vehiculos->anio, old('anio')}}">
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo (Mecánico/Automático)</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" value="{{$vehiculos->tipo, old('tipo')}}">
                    </div>

                    <div class="form-group">
                        <label for="recorrido">Kilometraje Recorrido (km)</label>
                        <input type="number" class="form-control" name="recorrido" id="recorrido" value="{{$vehiculos->recorrido, old('recorrido')}}">
                    </div>

                    <div class="form-group">
                        <label for="aire_acondicionado">Aire Acondicionado</label>
                        <input type="text" class="form-control" name="aire_acondicionado" id="aire_acondicionado" value="{{$vehiculos->aire_acondicionado, old('aire_acondicionado')}}">
                    </div>

                    <div class="form-group">
                        <label for="precio_d">Precio por Día (s./)</label>
                        <input type="number" class="form-control" name="precio_d" id="precio_d" value="{{$vehiculos->precio_d, old('precio_d')}}">
                    </div>

                    <div class="form-group">
                        <label for="foto_r">Foto Referencia (Url)</label>
                        <input type="text" class="form-control" name="foto_r" id="foto_r" value="{{$vehiculos->foto_r, old('foto_r')}}">
                    </div>

                    <div class="form-group">
                        <label for="clasifica">Clasificación</label>
                        <select class="form-control" id="clasifica" name="clasifica">
                            <option>-Seleccionar-</option>
                            <option value="1" @if($vehiculos->clasifica == 1) selected @endif>Económico</option>
                            <option value="2" @if($vehiculos->clasifica == 2) selected @endif>Standart</option>
                            <option value="3" @if($vehiculos->clasifica == 3) selected @endif>Premium</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Disponibilidad</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" @if($vehiculos->status == 1) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">Disponible</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" @if($vehiculos->status == 0) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault2">Ocupado</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoria de Vehículo</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option selected>-Seleccionar-</option>
                            @foreach ($categoria as $categoriax)
                            <option value="{{$categoriax->id}}" <?= $categoriax->id == $vehiculos->categories->id ? 'selected' : '' ?>>{{$categoriax->model}}</option>
                            @endforeach
                        </select>
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