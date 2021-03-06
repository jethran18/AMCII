<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Reporte</title>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </head>

    <body>
        <div class="container" id="container">
            <h2>REPORTE DE ACTIVIDADES DE LOS USUARIOS</h2>
            <div class="table-responsive" id="tabla"> 
            <br> 
                @if (!empty($usuarios))
                    @foreach ($usuarios as $usaurio)
                        <h3>Usuario: {{$usaurio->username}}</h3>
                        <table class="table table-withe">
                            <thead>
                                <tr>
                                    <th>Total de Atividades:</th>
                                    <th>Total Realizadas:</th>
                                    <th>Total Pendientes:</th>
                                    <th>Total Atrasadas:</th>
                                    <th>Total Casi Atrasadas:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if(!empty($actividades))
                                        @php($count=0)
                                        @foreach ($actividades as $actividad)
                                            @if($usaurio->id == $actividad->usuario_id)
                                                @php($count++)
                                            @endif
                                        @endforeach 
                                        <td>{{$count}}</td>   
                                        @php($countR=0)
                                        @foreach ($actividades as $actividad)
                                            @if ($usaurio->id == $actividad->usuario_id && $actividad->status == 'Realizada')
                                                @php($countR++)
                                            @endif
                                        @endforeach
                                        <td>{{$countR}}</td>
                                        @php($countP=0)
                                        @foreach ($actividades as $actividad)
                                            @if ($usaurio->id == $actividad->usuario_id && $actividad->status == 'Pendiente')
                                                @php($countP++)
                                            @endif
                                        @endforeach    
                                        <td>{{$countP}}</td>
                                        @php($countA=0)
                                        @foreach ($actividades as $actividad)
                                            @if ($usaurio->id == $actividad->usuario_id && $actividad->status == 'Atrasada')
                                                @php($countA++)
                                                @endif
                                        @endforeach    
                                        <td>{{$countA}}</td>
                                        @php($countCA=0)
                                        @foreach ($actividades as $actividad)
                                            @if ($usaurio->id == $actividad->usuario_id && $actividad->status == 'Casi atrasada')
                                                @php($countCA++)
                                            @endif
                                        @endforeach 
                                        <td>{{$countCA}}</td>   
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    @endforeach    
                @endif    
            </div>
            <br>
        </div>
    </body>
</html>