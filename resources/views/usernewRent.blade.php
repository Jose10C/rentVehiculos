<!-- modal new rent -->
<div class="modal fade" id="usernewRent-{{$vehiculo->id}}" tabindex="-1" role="dialog" aria-labelledby="updateRentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Realizar Nuevo Alquiler</h4>
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
                    <strong>Antes de continuar, Actualiza sus Datos</strong>
                    <!-- Actualizar datos u_user -->
                    <div class="form-group">
                        <label for="name">*Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="dni">*N° DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni" maxlength="8" value="{{auth()->user()->dni}}" require>
                    </div>
                    <div class="form-group">
                        <label for="telefono">*Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" maxlength="9" value="{{auth()->user()->telefono}}" require>
                    </div>
                    <div class="form-group">
                        <label for="direccion">*Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{auth()->user()->direccion}}" onselect="calcularFecha();" require>

                    </div>
                    <hr>
                    <!-- Realizar la Reserva -->
                    <div class="form-group">
                        <label for="a_inicio">*Fecha Inicial</label>
                        <input type="date" class="form-control" name="a_inicio" id="a_inicio" require>
                    </div>

                    <div class="form-group">
                        <label for="a_fin">*Fecha Final</label>
                        <input type="date" class="form-control" name="a_fin" id="a_fin" require>
                    </div>

                    <div class="form-group">
                        <label for="a_precio">Costo S/. {{$vehiculo->precio_d}} (X días)</label>
                        <input type="text" class="form-control" name="a_precio" id="a_precio" value="" disabled>
                        
                    </div>

                    <span>(*) Campos Obligatorios</span>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <!-- modal-notification-confirmacion -->
                        <!-- data-toggle="modal" data-target="#usernewRent-{{$vehiculo->id}}" -->
                        <button type="submit" class="btn btn-primary">Si, Reservar</button>
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-notification-confirmacion">Si, Reservar</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
