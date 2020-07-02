@foreach ($actividades as $actividad)
<div class="modal fade bd-example-modal-md" id="editActividad_{{$actividad->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" id="editActividadM">
        <div class="modal-content">
            <form action="{{ route('actividad.update',$actividad->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4>Editar Actividad</h4>
                    <button type="button" class="close" data-dismiss="modal" style="outline: none">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="nombreActividad" id="input-nombreActividad" placeholder="Nombre Actividad" value="{{$actividad->nombre}}">
                    <br>
                    <input type="text" class="form-control" name="descripcionActividad" id="input-descripcionActividad" placeholder="Descripción Actividad" value="{{$actividad->descripcion}}">
                    <br>
                    <input type="date" class="form-control" name="fechaCreacionActividad" id="input-fechaCreacionActividad" placeholder="Fecha Actividad" value="{{$actividad->fechaCreacion}}">
                    <br>
                    <select class="form-control" name="tablero_id" id="input-tablero_id">
                        <option value="">-- Seleccione --</option>
                        @if (!empty($tableros))
                            @foreach ($tableros as $tablero)
                                
                                @if ($tablero->id == $actividad->tablero_id)
                                    <option value="{{$tablero->id}}" selected="selected" >{{$tablero->nombre}}</option>
                                    @else
                                    <option value="{{$tablero->id}}" >{{$tablero->nombre}}</option>
                                @endif
                                
                            @endforeach    
                        @endif
                    </select><br>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Actualizar" id="actividades" style="margin: 0 100px 0 100px">
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach   
