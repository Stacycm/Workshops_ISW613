<?php
session_start();

// Si ya inició sesión, ir al perfil
if (isset($_SESSION["usuario_id"])) {
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio | Workshop 2</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f2eafa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tarjeta {
            background-color: white;
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.10);
        }

        .titulo {
            color: #8256c9;
            font-weight: bold;
        }

        .btn-personalizado {
            background-color: #8256c9;
            color: white;
            border-radius: 8px;
        }

        .btn-personalizado:hover {
            background-color: #6e43b4;
            color: white;
        }

        .btn-secundario {
            border: 1px solid #8256c9;
            color: #8256c9;
            border-radius: 8px;
        }

        .btn-secundario:hover {
            background-color: #f2eafa;
            color: #6e43b4;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card tarjeta">
                <div class="card-body text-center p-5">

                    <h1 class="titulo mb-3">¡Bienvenid@!</h1>

                    <h5 class="mb-3">Workshop 2</h5>

                    <p class="text-muted mb-4">
                        Gestiona tu cuenta fácilmente.
                        Inicia sesión o crea una cuenta para comenzar.
                    </p>

                    <a href="login.php"
                       class="btn btn-personalizado btn-block mb-3">
                        Iniciar sesión
                    </a>

                    <a href="registro.php"
                       class="btn btn-secundario btn-block">
                        Crear una cuenta
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
