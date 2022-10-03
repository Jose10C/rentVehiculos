<!-- modal new rent -->
<div class="modal fade" id="usernewRent-{{$vehiculo->id}}" tabindex="-1" role="dialog" aria-labelledby="updateRentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Realizar Nuevo Alquiler {{$vehiculo->id}}</h4>
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
                <form action="{{ url('/home/newrenta',$vehiculo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="a_inicio">Fecha Inicial</label>
                        <input type="date" class="form-control" name="a_inicio" id="a_inicio" require>
                    </div>

                    <div class="form-group">
                        <label for="a_fin">Fecha Final</label>
                        <input type="date" class="form-control" name="a_fin" id="a_fin" require>
                    </div>

                    <div class="form-group">
                        <label for="a_precio">Precio S/. (x día)</label>
                        <input type="number" class="form-control" name="a_precio" id="a_precio" value="{{$vehiculo->precio_d}}" disabled>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Si, Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>