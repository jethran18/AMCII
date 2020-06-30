<div class="modal fade bd-example-modal-md" id="createActividad" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" id="createActividadM">
        <div class="modal-content">
            <form action="{{ route('actividad.store', ['id'=> $id ?? ''])}}" method="POST"">
            <div class="modal-header">
                <h4>Crear Actividad</h4>
                <button type="button" class="close" data-dismiss="modal" style="outline: none">
                    <span>&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" name="nombreActividad" id="input-nombreActividad" placeholder="Nombre Actividad">
                    @csrf<br>
                    <input type="text" class="form-control" name="descripcionActividad" id="input-descripcionActividad" placeholder="Descripción Actividad">
                    @csrf<br>
                    <input type="date" class="form-control" name="fechaCreacionActividad" id="input-fechaCreacionActividad" placeholder="Fecha Actividad">
                    @csrf<br>
                    <select class="form-control" name="tablero_id" id="input-tablero_id">
                        <option value="">-- Seleccione --</option>
                        @if (!empty($tableros))
                            @foreach ($tableros as $tablero)
                                <option value="{{$tablero->id}}">{{$tablero->nombre}}</option>
                            @endforeach    
                        @endif
                    </select><br>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Crear" id="actividades" style="margin: 0 100px 0 100px">
                </div>
            </form>
        </div>
    </div>
</div>