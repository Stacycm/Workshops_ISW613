<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $username = $_POST["username"];
    $correo = $_POST["correo"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $provincia_id = $_POST["provincia"];

    $sql = "INSERT INTO usuarios
            (nombre, username, correo, password, provincia_id)
            VALUES
            ('$nombre', '$username', '$correo', '$password', '$provincia_id')";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "¡Usuario registrado correctamente!";
    } else {
        $mensaje = "Error al registrar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de usuarios</title>

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

    <div class="container mt-5 mb-5">

        <h1 class="text-center mb-2">¡Crea tu cuenta!</h1>

        <p class="text-center text-muted mb-4">
            Completa tus datos para registrarte
        </p>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card tarjeta">

                    <div class="card-header text-center">
                        <h4 class="mb-0">Registro de usuarios</h4>
                    </div>

                    <div class="card-body p-4">

                        <?php if ($mensaje != "") { ?>
                            <div class="alert alert-info text-center">
                                <?php echo htmlspecialchars($mensaje); ?>
                            </div>
                        <?php } ?>

                        <form action="registro.php" method="POST">

                            <div class="form-group">
                                <label for="nombre">Nombre completo</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="nombre"
                                    name="nombre"
                                    placeholder="Escribe tu nombre completo"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Elige un nombre de usuario"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="correo"
                                    name="correo"
                                    placeholder="ejemplo@correo.com"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Crea una contraseña"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="provincia">Provincia</label>

                                <select
                                    class="form-control"
                                    id="provincia"
                                    name="provincia"
                                    required>

                                    <option value="">Selecciona tu provincia</option>

                                    <?php
                                    $consulta = "SELECT * FROM provincias ORDER BY nombre";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<option value='" . $fila["id"] . "'>";
                                        echo htmlspecialchars($fila["nombre"]);
                                        echo "</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-personalizado btn-block">
                                Registrarme
                            </button>

                        </form>

                        <p class="text-center mt-4 mb-0">
                            ¿Ya tienes una cuenta?
                            <a href="login.php">Inicia sesión aquí</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>