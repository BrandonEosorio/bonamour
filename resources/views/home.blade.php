<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .toggle-icon {
            float: right;
        }
        .user-options {
            margin-top: auto;
            text-align: center;
        }
        .user-options img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .user-options .options {
            display: none;
            background: #495057;
            padding: 10px;
            border-radius: 5px;
        }
        .user-options .options a {
            display: block;
            padding: 5px;
            color: white;
            text-decoration: none;
        }
        .user-options .options a:hover {
            background: #6c757d;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h3>Menú</h3>
            <a href="#option1" data-toggle="collapse" class="toggle-link">
                Opción 1 <i class="fas fa-spa toggle-icon"></i>
            </a>
            <div id="option1" class="collapse">
                <a href="#">Subopción 1.1</a>
                <a href="#">Subopción 1.2</a>
            </div>
            <a href="#option2" data-toggle="collapse" class="toggle-link">
                Opción 2 <i class="fas fa-spa toggle-icon"></i>
            </a>
            <div id="option2" class="collapse">
                <a href="#">Subopción 2.1</a>
                <a href="#">Subopción 2.2</a>
            </div>
        </div>
        <div class="user-options">
            <img src="https://via.placeholder.com/50" alt="User Icon" id="user-icon">
            <p id="user-name">{{ Auth::user()->name }}</p>
            <div class="options" id="user-options">
                <a href="#">Ajuste</a>
                <a href="#">Perfil</a>
                <a href="#" id="logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Desconectarse
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>Bienvenido a la Página Principal</h1>
        <p>Contenido de la página principal.</p>
    </div>

    <!-- Mensaje emergente -->
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="login-alert">
        <span id="login-message"></span>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-link').click(function() {
                var icon = $(this).find('.toggle-icon');
                if (icon.hasClass('fa-spa')) {
                    icon.removeClass('fa-spa').addClass('fa-leaf');
                } else {
                    icon.removeClass('fa-leaf').addClass('fa-spa');
                }
            });

            // Mensajes aleatorios de login
            var messages = [
                "Bienvenido, mira nuestras ofertas",
                "Productos nuevos, echa un vistazo al catálogo",
                "¡Descubre nuestras últimas novedades!",
                "¡Bienvenido! Explora nuestras promociones",
                "¡Hola! No te pierdas nuestras ofertas exclusivas"
            ];
            var randomMessage = messages[Math.floor(Math.random() * messages.length)];
            $('#login-message').text(randomMessage);

            // Mostrar el mensaje de login solo si es necesario
            var showLoginAlert = true; // Cambia esta variable según la lógica de tu aplicación
            if (!showLoginAlert) {
                $('#login-alert').hide();
            }

            // Mostrar opciones de usuario al hacer clic en el icono
            $('#user-icon').click(function() {
                $('#user-options').toggle();
            });

            // Redirigir al login al hacer clic en "Desconectarse"
            $('#logout').click(function() {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        });
    </script>
</body>
</html>