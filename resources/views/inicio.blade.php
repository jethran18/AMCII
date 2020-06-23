<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=egde"/>

        <title>AMCII</title>
        <link href="{{ asset('../../css/lr.css') }}" rel="stylesheet">
        
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
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#">
                <h1>Crear Cuenta</h1>
                      
                <input type="text" placeholder="Nombre" />
                <input type="text" placeholder="Apellidos" />
                <input type="text" placeholder="Username" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Contraseña" />
                <input type="password" placeholder="Repetir Contraseña" />

                <button>Registrarse</button>
                </form>
            </div>
            
             <div class="form-container sign-in-container">
                    <form action="#">
                        <h1>Iniciar Sesión</h1>                       
                        <input type="text" placeholder="Username" />
                        <input type="password" placeholder="Contraseña" />
                        <button>Iniciar Sesion</button>
                    </form>
                </div>

            <div class="overlay-container">
                <!-- The overlay code goes here -->
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
