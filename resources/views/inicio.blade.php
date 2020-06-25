<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>AMCII</title>
        <link rel="stylesheet" href="css/app.css">


        <link href="{{ asset('../../css/lr.css') }}" rel="stylesheet">
        
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
        
        
        <style>
            body{
                background-image: url('../../img/bg.jpg'); 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    

    </head>
    <body>
        @include('error')
        <div class="container" id="container">
            <div class="form-container sign-up-container">
            <form action="{{ route('usuario.crearUsuario') }}" method="POST">
                @csrf 
            
                <h1>Crear Cuenta</h1>
                <input type="text"  placeholder="Nombre" name="nombre"/>
                <input type="text" placeholder="Apellidos" name="apellidos"/>
                <input type="text" placeholder="Username" name="username"/>
                <input type="email" placeholder="Email" name="correo"/>
                <input type="password" placeholder="Contraseña" name="password"/>
                <input type="password" placeholder="Repetir Contraseña" name="rpassword"/>

                <button type="submit">Registrarse</button>
                </form>
            </div>
            
             <div class="form-container sign-in-container">
                    <form action="#">
                        @csrf 
                        <h1>Iniciar Sesión</h1> 
                                              
                        <input type="text" placeholder="Username" />
                        <input type="password" placeholder="Contraseña" />
                        <button>Iniciar Sesion</button>
                    </form>
                </div>

            <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Bienvenido a AMCIIES!</h1>
                            <p>
                                ¿Ya tienes una cuenta?
                            </p>
                            <button class="ghost" id="signIn">Iniciar Sesión</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Bienvenido a AMCIIES!</h1>
                            <p>¿Aun no tienes una cuenta?</p>
                            <button class="ghost" id="signUp">Registrarse</button>
                        </div>
                    </div>

            </div>
        </div>
      
        <script src="{{  asset('../../js/login_animacion.js') }}"></script>        
        
    </body>
</html>
