<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Principal AMCII</title>

    <!--estilos-->
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('../../css/principalUsuario.css') }}" rel="stylesheet">

    
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

    <div id="contenedor" class=row>
       <div id="contenedor-tablero" class="col">
            <table class="table">
                <tbody>
                    @foreach ($tableros as $tablero)
                        <input type="submit" id="tableros" value="{{$tablero->nombre}}">
                    @endforeach
                    
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
       <div id="contenedor-actividades" class="col">    
           <!--  {{$tablero->id}} -->  
        </div>
    </div>
    
</body>
</html>