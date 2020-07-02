@foreach ($actividades as $actividad)
<div class="modal fade bd-example-modal-md" id="verActividad_{{$actividad->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" id="verActividadM">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center">{{$actividad->nombre}}</h4>
                    <button type="button" class="close" data-dismiss="modal" style="outline: none">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="descripcionActividad" id="descripcionActividad" class="form-control" style="min-height: auto;" readonly>
                        {{$actividad->descripcion}}
                    </textarea>
                    <br>
                    <input type="text" class="form-control" name="fechaCreacionActividad" id="input-fechaCreacionActividad" placeholder="Fecha Actividad" value="{{$actividad->fechaCreacion}}" readonly>
                    <br>
                    @foreach ($tableros as $tablero)
                        @if ($tablero->id == $actividad->tablero_id)
                            <input type="text" class="form-control" value="{{$tablero->nombre}}" readonly> 
                        @endif
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endforeach   