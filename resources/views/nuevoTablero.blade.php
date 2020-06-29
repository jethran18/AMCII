<div class="modal fade bd-example-modal-sm" id="createTablero" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document" id="createTableroM">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Crear Tablero</h4>
                <button type="button" class="close" data-dismiss="modal" style="outline: none">
                    <span>&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" name="nombreTablero" id="input-nombreTablero" placeholder="Nombre del tablero">
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Crear" id="tableros" style="margin: 0 100px 0 100px">
                </div>
            </form>
        </div>
    </div>
</div>