<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        <title>AMCIIES</title>
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

            label {
                color: red;
                margin: 0;
                padding: 0;
                font-size: 12px;
            }
        </style>
    
    </head>
    <body>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
            <form action="{{ route('usuario.crearUsuario') }}" method="POST">
                @csrf 
                <h1>Crear Cuenta</h1>
                <input type="text"  placeholder="Nombre" pattern="^[a-zA-Z]{3,50}" name="nombre"/>
                @error('nombre')
                    <label id="error-label">Ingrese su nombre</label>
                @enderror
                <input type="text" placeholder="Apellidos" pattern="^[a-zA-Z]{3,100}" name="apellidos"/>
                @error('apellidos')
                    <label id="error-label">Ingrese sus apellidos</label>
                @enderror
                <input type="text" placeholder="Username" name="username" pattern="^[a-zA-Z0-9]{3,50}"/>
                @error('username')
                    <label id="error-label">Ingrese un nombre de usuario</label>
                @enderror
                <input type="email" placeholder="Email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="correo"/>
                @error('email')
                    <label id="error-label">Ingrese un correo electronico valido</label>
                @enderror
                <input type="password" placeholder="Contraseña"  pattern="[A-Za-z0-9!?-]{8,12}" name="password" id="password"/>
                @error('password')
                    <label id="error-label">Ingrese una contraseña valida</label>
                @enderror
                <input type="password" placeholder="Repetir Contraseña"   pattern="[A-Za-z0-9!?-]{8,12}" name="rpassword" id="confirm_password"/>
                @error('rpassword')
                    <label id="error-label">Ingrese las misma contraseña</label>
                @enderror

                <button type="submit">Registrarse</button>
                </form>
            </div>
            
             <div class="form-container sign-in-container">
                    <form action="{{ route('usuario.login') }}" method="POST">
                        @csrf 
                        <h1>Iniciar Sesión</h1> 
                        @if(!empty($mensaje))
                            <div class="alert alert-danger" role="alert">
                                {{$mensaje}}                  
                            </div>
                        @endif
                        <input type="text" placeholder="Username" name="username" />
                        @error('username')
                            <label id="error-label">Ingrese un nombre de usuario</label>
                        @enderror
                        
                        <input type="password" placeholder="Contraseña" name="password" />
                        @error('password')
                            <label id="error-label">Ingrese una contraseña valida</label>
                        @enderror
                        
                        <button type="submit">Iniciar Sesion</button>
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
        <script>
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;    
        </script>     
        
    </body>
</html>
