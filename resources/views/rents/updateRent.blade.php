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
                        <label for="clients_id">N° DNI</label>
                        <input type="number" class="form-control" name="clients_id" id="clients_id" value="{{$alquilado->clients_id, old('clients_id')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="vehicles_id">N° Placa</label>
                        <input type="number" class="form-control" name="vehicles_id" id="vehicles_id" value="{{$alquilado->vehicles_id, old('vehicles_id')}}">
                    </div>

                    <div class="form-group">
                        <label for="users_id">N° Usuario</label>
                        <input type="number" class="form-control" name="users_id" id="users_id" value="{{$alquilado->users_id, old('users_id')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_inicio">Fecha Inicial</label>
                        <input type="date" class="form-control" name="a_inicio" id="a_inicio" value="{{$alquilado->a_inicio, old('a_inicio')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_fin">Fecha Final</label>
                        <input type="date" class="form-control" name="a_fin" id="a_fin" value="{{$alquilado->a_fin, old('a_fin')}}">
                    </div>

                    <div class="form-group">
                        <label for="a_precio">Precio</label>
                        <input type="number" class="form-control" name="a_precio" id="a_precio" value="{{$alquilado->a_precio, old('a_precio')}}">
                    </div>

                    <div class="form-group">
                        <label for="status">Situación</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" @if($alquilado->status == 1) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">Disponible</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0" @if($alquilado->status == 0) checked @endif>
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