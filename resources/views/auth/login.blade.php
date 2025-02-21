<!DOCTYPE html>
<html>
<head>
    <title>Página de Inicio de Sesión</title>
   
    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styleslogin.css') }}">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Iniciar Sesión</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico">
                        <div class="invalid-feedback" id="emailError">Por favor, ingrese su correo electrónico.</div>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                        <div class="invalid-feedback" id="passwordError">Por favor, ingrese su contraseña.</div>
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox" name="remember"> Recordarme
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="validateForm()" class="btn float-right login_btn">Ingresar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    ¿No tienes una cuenta?<a href="{{ route('register') }}"> Regístrate</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
    function validateForm() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var valid = true;

        if (!email) {
            document.getElementById('emailError').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('emailError').style.display = 'none';
        }

        if (!password) {
            document.getElementById('passwordError').style.display = 'block';
            valid = false;
        } else {
            document.getElementById('passwordError').style.display = 'none';
        }

        if (valid) {
            document.getElementById('loginForm').submit();
        }
    }
</script>
</body>
</html>