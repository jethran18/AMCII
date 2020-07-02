@foreach ($actividades as $actividad)
<div class="modal fade bd-example-modal-md" id="deleteActividad_{{$actividad->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" id="deleteActividadM">
        <div class="modal-content">
            <form action="{{ route('actividad.destroy',$actividad->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4>Eliminar Actividad</h4>
                    <button type="button" class="close" data-dismiss="modal" style="outline: none">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b style="color: white;">¿Seguro que desea eliminar la actividad : {{$actividad->nombre}}?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="actividades" data-dismiss="modal" style="margin: 0 100px 10px 100px">
                        Cancelar
                    </button>
                    <input type="submit" class="btn btn-primary" value="Eliminar" id="actividades" style="margin: 0 100px 0 100px">
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach  