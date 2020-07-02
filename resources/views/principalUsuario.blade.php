<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Principal AMCII</title>

    <!--estilos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('../../css/principalUsuario.css') }}" rel="stylesheet">

    <!--scripts-->
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</head>
<body>

    <div id="barra-superior">
        <svg id="return-icon" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
            <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
        <h2>
            AMCIIES
        </h2>
    </div>
   
    <div id="contenedor" class=row>
       <div id="contenedor-tablero" class="col-md-3">
            <table class="table">
                <tbody>
                    @if (!empty($tableros))
                        @foreach ($tableros as $tablero)
                            <input type="submit" id="tableros" onclick="mostrarActividadesAsociadas('{{$tablero->id}}', '{{$tablero->nombre}}')" value="{{$tablero->nombre}}">
                        @endforeach    
                    @endif
                    
                </tbody>
                <tfoot>
                        <td>
                            <button id="tableros" data-toggle="modal" data-target="#createTablero"> 
                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                </svg>
                            </button>
                        </td>
                </tfoot>
            </table>
    @include('nuevoTablero')
       </div>
       <div id="contenedor-actividades" class="col-md-9">    
            <table class="table">
                <thead>
                    <tr><th class="text-center"><h3 style="margin-bottom: 0px; color:white;" id="tituloActividades">Todas las actividades</h3></th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex flex-row">
                                @if (!empty($tableros))
                                <div class="p-2 bd-highlight" id="actividades">
                                    <button id="actividades" class="actividades center-block" data-toggle="modal" data-target="#createActividad" style="width: fit-content;"> 
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                    </button>
                                </div>
                                @if (!empty($actividades))
                                    @foreach ($actividades as $actividad)
                                        <div id="actividades" class="p-2 bd-highlight actividads_{{$actividad->tablero_id}} divActividad visible">
                                            <b>{{$actividad->nombre}} </b><br>
                                            @if($actividad->status == "Pendiente")
                                            <i class="fas fa-redo-alt"></i> <b style="color: rgba(210, 250, 251, 0.8);">{{$actividad->status}}</b><br>
                                            @elseif ($actividad->status == "Proxima a estar retrasada")
                                            <i class="fas fa-exclamation-triangle"></i> <b style="color: rgba(210, 250, 251, 0.8);">{{$actividad->status}}</b><br>
                                            @else
                                            <i class="fas fa-ban"></i> <b style="color: rgba(210, 250, 251, 0.8);">{{$actividad->status}}</b><br>
                                            @endif
                                            <i class="fas fa-calendar-alt"></i>  <b>{{$actividad->fechaCreacion}}</b><br>
                                            <a class="btn btn-info" data-toggle="modal" data-target="#verActividad_{{$actividad->id}}"><i class="far fa-eye"></i></a>
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#editActividad_{{$actividad->id}}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#deleteActividad_{{$actividad->id}}"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    @endforeach    
                                @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                </tbody>             
            </table>
            @include('nuevaActividad')
            @include('editarActividad')
            @include('verActividad')
            @include('eliminaActividad')
        </div>
    </div>
    
</body>
</html>