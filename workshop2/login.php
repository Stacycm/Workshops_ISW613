<?php
session_start();
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if ($usuario = mysqli_fetch_assoc($resultado)) {

        if (password_verify($password, $usuario["password"])) {
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["username"] = $usuario["username"];

            header("Location: perfil.php");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta";
        }

    } else {
        $mensaje = "El usuario no existe";
    }

    mysqli_stmt_close($stmt);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e9d5ff, #c4b5fd);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        h2 {
            color: #6d28d9;
            font-weight: bold;
        }

        .btn-purple {
            background-color: #7c3aed;
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background-color: #6d28d9;
            color: white;
        }

        .form-control:focus {
            border-color: #a78bfa;
            box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.2);
        }

        a {
            color: #7c3aed;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h2>¡Bienvenida!</h2>
            <p class="text-muted">Inicia sesión en tu cuenta</p>
        </div>

        <?php if ($mensaje != "") { ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php } ?>

        <form method="POST" action="">

            <div class="mb-3">
                <label class="form-label">Nombre de usuario</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Ingresa tu usuario"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="form-label">Contraseña</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Ingresa tu contraseña"
                    required
                >
            </div>

            <button type="submit" class="btn btn-purple w-100 py-2">
                Iniciar sesión
            </button>

        </form>

        <div class="text-center mt-4">
            <p class="mb-0">
                ¿No tienes una cuenta?
                <a href="registro.php">Regístrate aquí</a>
            </p>
        </div>
    </div>

</body>
</html>
