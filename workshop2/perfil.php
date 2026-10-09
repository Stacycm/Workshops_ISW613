<?php
session_start();
include("conexion.php");

// Verificar si el usuario inició sesión
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

// Obtener los datos del usuario
$id = $_SESSION["usuario_id"];

$sql = "SELECT usuarios.*, provincias.nombre AS provincia
        FROM usuarios
        INNER JOIN provincias
        ON usuarios.provincia_id = provincias.id
        WHERE usuarios.id = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    die("No se encontraron los datos del usuario.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f2eafa;
        }

        .tarjeta {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.10);
        }

        .card-header {
            background-color: #8256c9;
            color: white;
            border-radius: 15px 15px 0 0 !important;
        }

        .btn-personalizado {
            background-color: #8256c9;
            color: white;
        }

        .btn-personalizado:hover {
            background-color: #6e43b4;
            color: white;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card tarjeta">
                <div class="card-header text-center">
                    <h4 class="mb-0">Mi perfil</h4>
                </div>

                <div class="card-body p-4">

                    <p><strong>Nombre completo:</strong>
                        <?= htmlspecialchars($usuario["nombre"]) ?>
                    </p>

                    <p><strong>Nombre de usuario:</strong>
                        <?= htmlspecialchars($usuario["username"]) ?>
                    </p>

                    <p><strong>Correo electrónico:</strong>
                        <?= htmlspecialchars($usuario["correo"]) ?>
                    </p>

                    <p><strong>Provincia:</strong>
                        <?= htmlspecialchars($usuario["provincia"]) ?>
                    </p>

                    <div class="mt-4">
                        <a href="actualizar.php"
                           class="btn btn-personalizado btn-block">
                            Actualizar perfil
                        </a>

                        <a href="logout.php"
                           class="btn btn-outline-secondary btn-block">
                            Cerrar sesión
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
