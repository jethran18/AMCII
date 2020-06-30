<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--estilos-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/app.css">  
    <link href="{{ asset('../../css/infoUsuario.css') }}" rel="stylesheet">

    <!--scripts-->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>


    <title>Mi perfil</title>
</head>
<body>

   <!-- Encabeazado -->
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
                
            </div>
    </div>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    <!--Cuerpo-->
    <div id="container" class="form-group">

        <form action="{{ route('usuario.updateUsuario', ['id'=> $usuario->id])}}" method="POST">
            <div id="container-info" class="form-group">
                
                @method('PUT')
                @csrf 
                    <h1>Mi perfil</h1>
                    <input type="text"  
                    placeholder="Nombre" name="nombre" value="{{$usuario->nombre}}"/>
                    @error('nombre')
                        <label id="error-label">Ingrese su nombre</label>
                    @enderror
                    <input type="text" placeholder="Apellidos" name="apellidos" value="{{$usuario->apellidos}}"/>
                    @error('apellidos')
                        <label id="error-label">Ingrese sus apellidos</label>
                    @enderror
                    <input type="text" placeholder="Username" name="username" value="{{$usuario->username}}"/>
                    @error('username')
                        <label id="error-label">Ingrese un nombre de usuario</label>
                    @enderror
                    <input type="email" placeholder="Email" name="correo" value="{{$usuario->email}}"/>
                    @error('email')
                        <label id="error-label">Ingrese un correo electronico valido</label>
                    @enderror
                <button type="submit">Guardar</button>
            
            </div>
        </form>
    </div>

    
</body>
</html>