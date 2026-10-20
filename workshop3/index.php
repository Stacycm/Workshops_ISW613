<?php
require_once __DIR__ . '/utils/auth.php';

if (isset($_SESSION['user_id'])) {
    header('Location: /pages/dashboard.php');
    exit;
}

$errores = [
    'empty'       => 'Todos los campos son obligatorios.',
    'credentials' => 'Usuario o contraseña incorrectos.',
    'exists'      => 'Ese usuario ya existe.',
    'register'    => 'No se pudo completar el registro.',
];
$error = $_GET['error'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 3</title>
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
                    <h4 class="mb-0">Iniciar sesión</h4>
                </div>

                <div class="card-body">

                    <?php if (isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
                        <div class="alert alert-success">
                            Usuario registrado. Ya puedes iniciar sesión.
                        </div>
                    <?php endif; ?>

                    <?php if ($error && isset($errores[$error])): ?>
                        <div class="alert alert-danger"><?= h($errores[$error]) ?></div>
                    <?php endif; ?>

                    <form action="/actions/login.php" method="POST">
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
                            Iniciar sesión
                        </button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        ¿No tienes cuenta?
                        <a href="/pages/register_form.php">Regístrate</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
