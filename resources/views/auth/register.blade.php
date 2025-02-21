<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesregister.css') }}">
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Register</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form id="registerForm">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="name" class="form-control" placeholder="Nombre">
                    </div>
                    <span id="nameError" class="error-message"></span>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <span id="emailError" class="error-message"></span>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <span id="passwordError" class="error-message"></span>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña">
                    </div>
                    <span id="confirmPasswordError" class="error-message"></span>
                    <div class="form-group">
                        <input type="submit" value="Register" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    ¿Ya tienes una cuenta?<a href="login"> Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let valid = true;

        // Clear previous error messages
        document.getElementById('nameError').textContent = '';
        document.getElementById('emailError').textContent = '';
        document.getElementById('passwordError').textContent = '';
        document.getElementById('confirmPasswordError').textContent = '';

        // Validate fields
        if (document.getElementById('name').value === '') {
            document.getElementById('nameError').textContent = 'Nombre es requerido';
            valid = false;
        }
        if (document.getElementById('email').value === '') {
            document.getElementById('emailError').textContent = 'Correo electrónico es requerido';
            valid = false;
        }
        if (document.getElementById('password').value === '') {
            document.getElementById('passwordError').textContent = 'Contraseña es requerida';
            valid = false;
        }
        if (document.getElementById('confirmPassword').value === '') {
            document.getElementById('confirmPasswordError').textContent = 'Confirmar contraseña es requerido';
            valid = false;
        }
        if (document.getElementById('password').value !== document.getElementById('confirmPassword').value) {
            document.getElementById('confirmPasswordError').textContent = 'Las contraseñas no coinciden';
            valid = false;
        }

        if (valid) {
            // Assign default role (cliente)
            const user = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                role: 0 // cliente
            };

            // Here you would typically send the user data to your server
            console.log('User registered:', user);
            alert('Registro exitoso');
        }
    });
</script>
</body>
</html>