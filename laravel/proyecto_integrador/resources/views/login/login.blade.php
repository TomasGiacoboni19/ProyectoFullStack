    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link  rel ="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{'css/login.css'}}">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="/js/login.js"></script>
        <title>Document</title>
    </head>
    <body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif

    @endif
    <div class="container">
            <form action="login" class="form" method="POST" id="formLogin">
                @csrf
                <p>
                    ¡Bienvenido!<span>Inicia Sesión para continuar</span>
                </p>
                <div class="separator">
                    <div></div>
                    <span><i class="bi bi-box-arrow-in-right"></i></span>
                    <div></div>
                </div>
                <label for="usuario"></label>
                <input type="text" placeholder="Usuario" name="usuario" id="usuario" required>
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="Contraseña"  required>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <button class="oauthButton" type="submit">
                    Ingresar
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                </button>
                <p>¿No tenes cuenta?</p>
                <button class="oauthButton" id="botonRegistro">
                    Crear una cuenta
                </button>
                    <p>
                        <span><a href="javascript:history.back()">Volver</a></span>
                    </p>
            </form>
            <form action="/clientes/registro" method="post" class="form oculto" id="formRegistro">
                @csrf
                <p>
                    ¡Bienvenido!<span>Completa tus datos para continuar</span>
                </p>
                <div class="separator">
                    <div></div>
                    <span><i class="bi bi-box-arrow-in-right"></i></span>
                    <div></div>
                </div>
                <label for="nombre" class="form-label oculto"></label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required autocomplete="off">
                <label for="apellido" class="form-label oculto"></label>
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresa tu apellido" required autocomplete="off">
                <label for="usuario" class="form-label oculto"></label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa tu nombre de usuario" required autocomplete="off">
                <label for="email" class="form-label oculto"></label>
                <input type="email" id="email" name="mail" class="form-control" placeholder="Ingresa tu correo electrónico" required autocomplete="off">
                <label for="password" class="form-label oculto"></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa una contraseña" required autocomplete="off">
                <button class="oauthButton" type="submit">
                    Registrarse
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                </button>
                <p>¿Tenés una cuenta?</p>
                <button class="oauthButton" id="botonLogin">
                    Ingresar con una cuenta
                </button>
                <p>
                    <span><a href="javascript:history.back()">Volver</a></span>
                </p>
            </form>
        </div>
    </div>
    <?php
    // echo password_hash("1234", PASSWORD_BCRYPT);
    ?>
    </body>
    </html>
