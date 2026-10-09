<?php
session_start();
include("conexion.php");

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["usuario_id"];
$mensaje = "";

// Obtener los datos actuales
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    die("No se encontró el usuario.");
}

// Actualizar los datos cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $provincia_id = (int) $_POST["provincia"];

    $sql = "UPDATE usuarios
            SET nombre = ?, correo = ?, provincia_id = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param(
        $stmt, "ssii", $nombre, $correo, $provincia_id, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: perfil.php");
        exit();
    } else {
        $mensaje = "Error al actualizar. Comprueba que el correo no esté en uso.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar perfil</title>
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
        }

        .btn-personalizado {
            background-color: #8256c9;
            color: white;
        }
    </style>
</head>

<body>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card tarjeta">
                <div class="card-header text-center">
                    <h4>Actualizar perfil</h4>
                </div>

                <div class="card-body p-4">

                    <?php if ($mensaje != "") { ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($mensaje) ?>
                        </div>
                    <?php } ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre completo</label>
                            <input type="text" name="nombre" id="nombre"
                                   class="form-control"
                                   value="<?= htmlspecialchars($usuario["nombre"]) ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" name="correo" id="correo"
                                   class="form-control"
                                   value="<?= htmlspecialchars($usuario["correo"]) ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="provincia">Provincia</label>
                            <select name="provincia" id="provincia"
                                    class="form-control" required>
                                <?php
                                $consulta = mysqli_query(
                                    $conexion,
                                    "SELECT * FROM provincias ORDER BY nombre"
                                );

                                while ($fila = mysqli_fetch_assoc($consulta)) {
                                    $seleccionada =
                                        ($fila["id"] == $usuario["provincia_id"])
                                        ? "selected" : "";

                                    echo "<option value='" . $fila["id"] . "' "
                                        . $seleccionada . ">"
                                        . htmlspecialchars($fila["nombre"])
                                        . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit"
                                class="btn btn-personalizado btn-block">
                            Guardar cambios
                        </button>

                        <a href="perfil.php"
                           class="btn btn-outline-secondary btn-block">
                            Volver al perfil
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
