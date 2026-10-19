<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /workshop3/pages/dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 3</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header text-center">
                    <h4>Iniciar sesión</h4>
                </div>

                <div class="card-body">

                    <?php if (isset($_GET['error'])): ?>

                        <div class="alert alert-danger">
                            Usuario o contraseña incorrectos.
                        </div>

                    <?php endif; ?>

                    <form action="/workshop3/actions/login.php" method="POST">

                        <div class="form-group">
                            <label for="username">Usuario</label>

                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Iniciar sesión
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>