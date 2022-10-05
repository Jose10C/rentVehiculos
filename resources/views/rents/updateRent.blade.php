<!-- modal -->
<div class="modal fade" id="updateRent-{{$alquilado->id}}" tabindex="-1" role="dialog" aria-labelledby="updateRentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Alquiler {{$alquilado->id}}</h4>
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
                <form action="{{ url('/rents/update',$alquilado->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="users_id">N° DNI</label>
                        <select class="form-control" id="users_id" name="users_id">
                            <option selected>-Seleccionar-</option>
                            @foreach ($usuarios as $ucliente)
                            <option value="{{$alquilado->users_id}}" <?= $ucliente->id == $alquilado->usuarios->id ? 'selected' : '' ?>>{{$ucliente->dni}}-{{$ucliente->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicles_id">N° Vehiculo</label>
                        <select class="form-control" id="vehicles_id" name="vehicles_id">
                            <option selected>-Seleccionar-</option>
                            @foreach ($vehiculo as $uvehiculo)
                            <option value="{{$alquilado->vehicles_id}}" <?= $uvehiculo->id == $alquilado->vehicles->id ? 'selected' : '' ?>>{{$uvehiculo->placa}}-{{$uvehiculo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="a_inicio">Fecha Inicial</label>
                        <input type="date" class="form-control" name="a_inicio" id="a_inicio" value="{{$alquilado->a_inicio}}">
                    </div>

                    <div class="form-group">
                        <label for="a_fin">Fecha Final</label>
                        <input type="date" class="form-control" name="a_fin" id="a_fin" value="{{$alquilado->a_fin}}">
                    </div>

                    <div class="form-group">
                        <label for="a_precio">Precio</label>
                        <input type="number" class="form-control" name="a_precio" id="a_precio" value="{{$alquilado->a_precio}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="status">Situación</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" @if($alquilado->status == 1) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">En Ejecución</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" @if($alquilado->status == 0) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault2">Ejecutado</label>
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