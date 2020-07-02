<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Actividades</title>

    <!--estilos-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('../../css/admin.css') }}" rel="stylesheet">

    <!--scripts-->
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
        
        <div class="container" id="containerT">
        <div class >
        <a href="" class="btn btn-primary" id="usersD" >Generar reporte</a>
        </div>
        
        <div class="table-responsive" id="tabla">          
            <table class="table table-dark">
            <thead>
                <tr>
                    <th>Tablero</th>
                    <th>Actividad</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                </tr>
                </thead>
                <tbody>
                    @if (!empty($actividades))
                        @foreach ($actividades as $actividad)
                            <tr>
                                <td>{{$actividad->nombreTablero}}</td>
                                <td>{{$actividad->nombre}}</td>
                                <td>{{$actividad->status}}</td>
                                <td>{{$actividad->fechaCreacion}}</td>
                                <td>{{$actividad->username}}</td>
                            </tr>
                        @endforeach    
                    @endif
                </tbody>
            </table>
            </div>
        </div>
        
    </body>
</html>