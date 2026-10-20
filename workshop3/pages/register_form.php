<?php
require_once __DIR__ . '/../utils/auth.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet"
          href="[maxcdn.bootstrapcdn.com](https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css)">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body class="auth">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-0">Crear cuenta</h4>
                </div>

                <div class="card-body">

                    <?php if (($_GET['error'] ?? '') === 'exists'): ?>
                        <div class="alert alert-danger">Ese usuario ya existe.</div>
                    <?php elseif (($_GET['error'] ?? '') === 'empty'): ?>
                        <div class="alert alert-danger">Todos los campos son obligatorios.</div>
                    <?php elseif (($_GET['error'] ?? '') === 'register'): ?>
                        <div class="alert alert-danger">No se pudo completar el registro.</div>
                    <?php endif; ?>

                    <form action="/workshop3/actions/register.php" method="POST">
                        <div class="form-group">
                            <label for="name">Nombre completo</label>
                            <input type="text" class="form-control" id="name"
                                   name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username"
                                   name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password"
                                   name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Registrarme
                        </button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        <a href="/pages/index.php">Volver al login</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
