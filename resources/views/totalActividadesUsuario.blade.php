<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AMCIIES</title>

    <!--estilos-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">  
    <link href="{{ asset('../../css/ttActividadesUser.css') }}" rel="stylesheet">

    <!--scripts-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{  asset('../../js/seleccionar_realizadas.js') }}"></script>     

</head>
<body>
    <div id="barra-superior">
        <div class="row">
            <div class="col">
                <svg id="return-icon" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
            <div class="col-5">
                <h2>
                    AMCIIES
                </h2>
            </div>
            <div class="col">
                <form action="{{ route('usuario.getUsuario', ['id'=> $id]) }}" style="margin: none">
                <button class="btn btn-secondary" type="submit" id="btperfil" >
                    <svg id="perfil-option" width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                </button>
                </form>
            </div>
    </div>


    <!--cuerpo-->
    <div class="container" id="container">
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="submit" id="btGenerarReporte" class="btn btn-primary" value="Generar Reporte">
                </div>
                <div class="col-sm-6">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroup">
                            <option selected>Filtro</option>
                            <option value="1">Pendiente</option>
                            <option value="2">Atrasadas</option>
                            <option value="3">Casi Atrasadas</option>
                            <option value="4">Realizadas</option>
                        </select>
                    </div>
                </div>
            </div>    
            <div>
                <div id="container-tablero" class="table-responsive">
                    <table class="table" id="table-Actividades">
                        <thead>
                        <tr>
                                @for ($i = 0; $i < count($headers); $i++)
                                    <th>
                                        {{$headers[$i]}}
                                    </th>
                                @endfor
                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($actividades as $actividad)
                                <tr>
                                    <th>
                                        {{$actividad->nombreTablero}}
                                    </th>
                                    <th>
                                        {{$actividad->nombre}}
                                    </th>
                                    <th>
                                        {{$actividad->status}}
                                    </th>
                                    <th>
                                        {{$actividad->fechaCreacion}}
                                    </th>
                                    <th>
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="CheckListTarea" value="{{$actividad->id}}">
                                    </th>
                                </tr>
                                @endforeach
                            
                        </tbody>
                    </table>  
                </div>
            </div>
            <input type="submit" id="btnEnviar" onclick="actividadesSeleccionadas({{$id}})" value="Enivar">
        </div>

</body>
</html>